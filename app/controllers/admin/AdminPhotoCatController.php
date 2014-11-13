<?php
/**
 * Created by PhpStorm.
 * User: almark
 * Date: 12/4/2014
 * Time: 2:50 AM
 */

class AdminPhotoCatController extends \BaseController{
    /**
     * Display a listing of the resource.
     * GET /admin photo categories
     *
     * @return Response
     */
    public function index()
    {
        $photo_cats = PhotoCategory::all();
        return View::make('admin.photo_categories.index')->with('photo_cats', $photo_cats);
    }
// create photo categories
    public function create()
    {
       return View::make('admin.photo_categories.create');
    }
// post photo categories
    public function store()
    {
        $val = Validator::make($data = Input::all(), PhotoCategory::$photo_rules);
        if($val->failed()){
            return Redirect::back()->withInput()->withErrors($val);
        }else{
            $photo_cats = new PhotoCategory();
            $photo_cats->name = Input::get('name');
            $photo_cats->user_id = Input::get('user_id');
            $photo_cats->save();
            return Redirect::route('admin.photo_categories.index');
        }
    }
// edit photo categories
    public function edit($id)
    {
        $photo_cat = PhotoCategory::find($id);

        return View::make('admin.photo_categories.edit', compact('photo_cat'));
    }

//  Update categories
    public function update($id)
    {
        $photo_cat= PhotoCategory::findOrFail($id);

        $v = Validator::make($data = Input::all(), PhotoCategory::$photo_rules);

        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        }

        $photo_cat->update($data);
        return Redirect::route('admin.photo_categories.index');

    }

    public function destroy($id)
    {
        PhotoCategory::destroy($id);
        return Redirect::route('admin.photo_categories.index');
    }

}