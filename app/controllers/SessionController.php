<?php

class SessionController extends BaseController {

    public function __construct()
    {

    }

    public function create()
    {
        return View::make('users.login');
    }

    public function store()
    {
        $params = [
            'email'    => Input::get('account'),
            'username' => Input::get('account'),
            'password' => Input::get('password')
        ];
        if (str_contains(Input::get('account'), '@')) {
            $authenticator = array_only($params, ['email', 'password']);
        } else {
            $authenticator = array_only($params, ['username', 'password']);
        }
        if (Auth::attempt($authenticator, Input::has('remember_me'))) {
            return Redirect::intended('/');
        }
        return Redirect::back();
    }

    public function destroy()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::to('/');
    }

    public function logout()
    {
        return View::make('users.logout');
    }
}
