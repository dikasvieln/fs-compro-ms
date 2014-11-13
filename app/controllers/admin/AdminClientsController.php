<?php

/**
* admin clients controller
*/
class AdminClientsController extends \BaseController
{
	public function index()
	{
		$clients = Client::all()->sortBy('desc');
		return View::make('admin.clients.index', compact('clients'));
	}

	public function create()
	{
		return View::make('admin.clients.create');
	}

	public function store(){
		$val = Validator::make(Input::all(), Client::$rules);

		// validate of input image
		if($val->passes()){
			$client = new Client();
			$client->user_id = Input::get('user_id');
			$client->title = Input::get('title');
			$client->detail = Input::get('detail');
			$client->thumbnailName = Input::get('thumbnailName');

			$image = Input::file('image');

			if ($image){
				$newPict = str_replace('', '-', Input::get('thumbnailName') . '-' . time() . '.' . $image->getClientOriginalName() );
				// upload to directory
				$destPath = public_path('/' . Site::$clientimg . $newPict);
				Image::make($image->getRealPath())->resize(200,200)->save($destPath);
				//$image->move($destPath, $newPict);
				// save pict url to database 
				$client->image = Site::$clientimg . $newPict;
			}

			$client->save();

			return Redirect::route('admin.clients.index')->with('message', 'Created!!');
		}

		return Redirect::back()->withInput()->withErrors($val);
		
	}

	public function edit($id)
	{
		$client  = Client::find($id);

		return View::make('admin.clients.edit', compact('client'));
	}

	/**
	 * admin clients update
	 */
	public function update($id)
	{

		$v = Validator::make($data = Input::all(), Client::$rules);

		if ($v->passes()) {
			
			$client = Client::findOrfail($id);
			$image = Input::file('image');

			if($image){
				$newPict = str_replace('', '-', Input::get('thumbnailName') . '-' . time() . '.' . $image->getClientOriginalExtension() );
				
				if ($client->image){
					File::delete(public_path('/' . Site::$clientimg));
				}

				$destPath = public_path(Site::$clientimg . $newPict);
				Image::make($image->getRealPath())->resize(200,200)->save($destPath);

				$client->image = Site::$clientimg . $newPict;
				
				$client->user_id = Input::get('user_id');
				$client->title = Input::get('title');
				$client->detail = Input::get('detail');
				
				$client->save();
				$client->update(Input::except('image'));
				return Redirect::intended('admin/clients/')->with("message", "Success to edit");
			}		
		}else{
			return Redirect::back()->withInput()->withErrors($v);
		}
		
	}

	public function destroy($id){
		
		$client = Client::find($id);
	
		// delete client image
		if($client->image) File::delete(public_path('/' . $client->image));
		
		// delete client row from database
		
		$client->delete();

		return Redirect::route('admin.clients.index');
	}
}