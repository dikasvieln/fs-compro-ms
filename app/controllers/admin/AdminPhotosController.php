<?php

class AdminPhotosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /photos
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = DB::table('photos')->simplePaginate(6);

        return View::make('admin.photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /photos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//create page form
        return View::make('admin.photos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /photos
	 *
	 * @return Response
	 */
	public function store()
	{
		//post of create photo
        $val = Validator::make(Input::all(), Photo::$rules);

        if ($val->passes()){
            $photo = new Photo();
            $image = Input::file('image');

                $file = time() . '.' . $image->getClientOriginalName();
                $destPath = public_path(Site::$galleryimg);
                $destThumb = public_path(Site::$galthumbimg);
                File::exists($destPath) or File::makeDirectory($destPath);
                File::exists($destThumb) or File::makeDirectory($destThumb);
                // Image Processing
                Image::make($image->getRealPath())
                                  ->save($destPath . $file)
                                  ->resize(200,150)
                                  ->save($destThumb . '250-' . $file);
                //save the path to the database
                $photo->image = Site::$galleryimg . $file;
                $photo->thumbImg = Site::$galthumbimg . '250-' .$file;

            $photo->title = Input::get('title');
            $photo->desc = Input::get('desc');
            $photo->user_id = Input::get('user_id');
            $photo->photo_category_id = Input::get('photo_category_id');
            $photo->save();
            return Redirect::route('admin.photo.index');
        }

        return Redirect::back()->withInput(Input::all())->withErrors($val);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /photos/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//edit page of photo
        $photo = Photo::find($id);
        return View::make('admin.photos.edit', compact('photo'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//update post
        $val = Validator::make(Input::all(), Photo::$rules);

        if ($val->passes()){

            $photo = Photo::findOrFail($id);
            $image = Input::file('image');

            if($image)
            {
                $file = time() . '.' . $image->getClientOriginalName();
                // if exist delete first
                if ($photo->image)
                {
                    File::delete(public_path(Site::$galleryimg) . $file, public_path(Site::$galthumbimg) . $file);
                }
                $destPath = public_path(Site::$galleryimg);
                $destThumb = public_path(Site::$galthumbimg);
                // Image Processing
                Image::make($image->getRealPath())
                    ->save($destPath . $file)
                    ->resize(200, 150)
                    ->save($destThumb . '250-' . $file);
                //save the path to the database
                $photo->image = Site::$galleryimg . $file;
                $photo->thumbImg = Site::$galthumbimg . '250-' . $file;

                $photo->title = Input::get('title');
                $photo->desc = Input::get('desc');
                $photo->user_id = Input::get('user_id');
                $photo->photo_category_id = Input::get('photo_category_id');

                $photo->save();
                $photo->update(Input::all());

                return Redirect::route('admin.photo.index')->with('message', 'success to update');
            }
        }else
        {
            return Redirect::back()->withInput()->withErrors($val);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//delete per id
        Photo::destroy($id);
        return Redirect::route('admin.photo.index');
	}

}