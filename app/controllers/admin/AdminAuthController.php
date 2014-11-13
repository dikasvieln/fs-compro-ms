<?php
/**
 * Created by PhpStorm.
 * User: almark
 * Date: 11/13/2014
 * Time: 9:24 PM
 */

class AdminAuthController extends \BaseController {
    function getLogin(){
        return View::make('admin.auth.login');
    }

    function postLogin(){
        $data = Input::all();

        $validator = Validator::make($data, User::$auth_rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email'=>Input::get('email'), 'password' => Input::get('password')])) {
            return Redirect::intended('admin/');
        }

        return Redirect::route('admin.login');
    }

    function getLogout(){
        Auth::logout();
        return Redirect::route('admin.login');
    }
} 