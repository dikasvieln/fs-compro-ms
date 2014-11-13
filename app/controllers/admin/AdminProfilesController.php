<?php

/**
* admin profiles controller
*/
class AdminProfilesController extends \BaseController
{
	/**
	 * admin profile index
	 */
	public function index()
	{
		$profiles = Profile::all();
		return View::make('admin.profiles.index', compact('profiles'));
		// var_dump($profiles);
	}

	/**
	 * admin profile create
	 */
	// public function create()
	// {
	// 	return View::make('admin.profiles.create');		
	// }

	/**
	 * admin profile store
	 */
	public function store()
	{
		$v = Validator::make($data = Input::all(), Profile::$rules);

		if ($v->fails()) {
			return Redirect::back()->withErrors($v)->withInput();
		}

		Profile::create($data);

		return Redirect::route('admin.profiles.index');
	}

	/**
	 * admin profile edit
	 */

	public function edit($id)
	{
		$profile = Profile::find($id);

		return View::make('admin.profiles.edit', compact('profile'));
	}

	/**
	 * admin profile update
	 */
	public function update($id)
	{
		$profile = Profile::findOrFail($id);

		$v = Validator::make($data = Input::all(), Profile::$rules);

		if ($v->fails()) {
			return Redirect::back()->withErrors($v)->withInput();
		}

		$profile->update($data);
		return Redirect::route('admin.profiles.index');
	}

	public function destroy($id)
	{
		Profile::destroy($id);
		return Redirect::route('admin.profiles.index');
	}
}