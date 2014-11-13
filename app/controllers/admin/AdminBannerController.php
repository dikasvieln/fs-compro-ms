<?php

class AdminBannerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /adminbanner
	 *
	 * @return Response
	 */
	public function index()
	{
		$banners = DB::table('banners')->get();
        return View::make('admin.banners.index', compact('banners'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminbanner/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminbanner
	 *
	 * @return Response
	 */
	public function store()
	{
		$val = Validator::make(Input::all(), Banner::$rules);
	    if($val->passes()){
            $banner = new Banner();
            $banner->title = Input::get('title');
            $banner->desc = Input::get('desc');

            $image = Input::file('image');

            if ($image){
                $newPict = str_replace('', '-', Input::get('title') . '-' . time() . '.' . $image->getClientOriginalName() );
                // upload to directory
                $destPath = public_path('/' . Site::$bannerimg . $newPict);
                Image::make($image->getRealPath())->resize(1200,500)->save($destPath);
                // save pict url to database
                $banner->image = Site::$bannerimg . $newPict;
            }
            $banner->save();
            return Redirect::route('admin.banner.index');
        }
        return Redirect::back()->withInput()->withErrors($val);
    }

	/**
	 * Display the specified resource.
	 * GET /adminbanner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adminbanner/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $banner = Banner::find($id);
        return View::make('admin.banners.edit', compact('banner'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adminbanner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $banner = Banner::findOrFail($id);
        $val = Validator::make(Input::all(), Banner::$rules);
        if($val->passes()){

            $banner->title = Input::get('title');
            $banner->desc = Input::get('desc');

            $image = Input::file('image');

            if ($image){
                $newPict = str_replace('', '-', Input::get('title') . '-' . time() . '.' . $image->getClientOriginalName() );
                // upload to directory
                $destPath = public_path('/' . Site::$bannerimg . $newPict);
                Image::make($image->getRealPath())->resize(1200,500)->save($destPath);
                // save pict url to database
                $banner->image = Site::$bannerimg . $newPict;
            }

            $banner->save();
            $banner->update(Input::except('image'));
            return Redirect::route('admin.banner.index');
        }
        return Redirect::back()->withInput()->withErrors($val);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminbanner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $banner = Banner::find($id);

        // delete  image
        File::delete(public_path(Site::$bannerimg . $banner->image));

        // delete client row from database

        $banner->delete();

        return Redirect::route('admin.banner.index');
	}

}