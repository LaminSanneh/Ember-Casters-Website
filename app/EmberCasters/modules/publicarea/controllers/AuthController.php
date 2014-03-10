<?php

namespace EmberCasters\Modules\PublicArea\Controllers;
use \View as View;
use \Redirect as Redirect;
use \EmberCasters\Models\Lesson as Lesson;
use \Input as Input;
use \Auth as Auth;
class AuthController extends \BaseController {

    public function showLoginForm(){
        return View::make('publicarea.auth.showLoginForm');
    }

    public function login(){
        $data = Input::only('email', 'password');
        if(Auth::attempt($data)){
            return Redirect::intended('/')->with('message','Logged in successfully');
        }

        return Redirect::route('showLoginForm')->with('message','Something wrong happened with login <br/> please check credentials');
    }

    public function logout(){
        Auth::logout();
        if(!Auth::check()){
            return Redirect::route('showLoginForm')->with('message','Logged out successfully');
        }

        return Redirect::route('home');
    }

}

?>