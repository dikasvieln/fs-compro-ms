<?php
/**
* admin page welcoming
*/
class AdminController extends \BaseController
{
	public function index()
	{
		return View::make("admin.index");
	}
}