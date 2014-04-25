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
        $authenticator = str_contains(Input::get('account'), '@')
            ? array_only($this->params(), ['email', 'password'])
            : array_only($this->params(), ['username', 'password']);

        if (Auth::attempt($authenticator, Input::has('remember_me'))) {
            return Redirect::intended('/')
                ->withNotice('User authenticate failed');
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

    private function params()
    {
        return [
            'email'    => Input::get('account'),
            'username' => Input::get('account'),
            'password' => Input::get('password')
        ];
    }
}
