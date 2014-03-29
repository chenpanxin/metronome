<?php

class UserController extends BaseController {

    public function __construct()
    {

    }

    public function create()
    {
        return View::make('users.signup');
    }

    public function store()
    {
        $user = new User;
        $user->email = Input::get('email');
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->avatar_url = '';
        if ($user->save()) {
            Auth::login($user);
            return Redirect::to('/');
        }
        return Redirect::back();
    }
}