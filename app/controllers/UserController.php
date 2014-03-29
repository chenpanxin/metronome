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

    public function profileEdit()
    {
        return View::make('users.profile.edit');
    }

    public function edit()
    {
        return View::make('users.edit');
    }

    public function notify()
    {
        return Redirect::to('settings/profile');
    }
}