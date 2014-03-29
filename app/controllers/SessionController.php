<?php

class SessionController extends BaseController {

    public function __construct()
    {

    }

    public function create()
    {
        return View::make('users.login');
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
