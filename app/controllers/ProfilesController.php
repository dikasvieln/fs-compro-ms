<?php

class ProfilesController extends \BaseController {

	public function index()
	{	
		$profile = Profile::all()['0'];

		#print_r($profile);
		return View::make('pages.profile', compact("profile"));
	}

	
}
