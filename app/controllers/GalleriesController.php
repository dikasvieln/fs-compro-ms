<?php

class GalleriesController extends \BaseController {

//    public function __construct(){
//        parent::__construct();
//    }
	/**
	 * Display a listing of the resource.
	 * GET /photo_categories
	 *
	 * @return Response
	 */
	public function index()
    {
        return View::make('galleries.index')
            ->with('photos', DB::table('photos')->paginate(9));
	}

    public function getCategory($id){

        return View::make('galleries.category')
            ->with('photos', Photo::where('photo_category_id','=', $id )->paginate(9))
            ->with('cat_photo', PhotoCategory::find($id));
    }

    public function getShow($id)
    {
        return View::make('galleries.view')
            ->with('photo', Photo::find($id));
    }

}