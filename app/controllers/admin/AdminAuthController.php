<?php
/**
 * Created by PhpStorm.
 * User: almark
 * Date: 11/13/2014
 * Time: 9:24 PM
 */

class AdminAuth extends \BaseController {
    function getLogin(){
        return View::make('admin.auth.login');
    }

    function getPost(){
        $data = Input::all();

        $validator = Validator::make($data, User::$auth_rules);
        
    }

    function getLogout(){
        Auth::logout();
        return Redirect::route('admin.login');
    }
} 