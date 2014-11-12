<?php

class ClientController extends \BaseController {

	public function index()
	{
		return View::make('pages.client');
	}
}