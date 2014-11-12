<?php

class AboutController extends \BaseController {

	public function index()
	{
		return View::make('pages.about');
	}
}