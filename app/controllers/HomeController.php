<?php

class HomeController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

	public function index()
	{
        $photos = DB::table('photos')
            ->select('thumbImg','image','title')
            ->take(6)
            ->orderBy('created_at', 'DESC')
            ->get();

        $banners = DB::table('banners')->get();

        return View::make('pages.home', compact('photos', 'banners'));
	}

}
