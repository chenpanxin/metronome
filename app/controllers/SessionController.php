<?php

class SessionController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', [
            'on' => 'post'
        ]);
    }

    public function create()
    {
        return View::make('session.new');
    }

    public function store()
    {
        $authenticator = str_contains(Input::get('account'), '@')
            ? array_only($this->params(), ['email', 'password'])
            : array_only($this->params(), ['username', 'password']);

        if (Auth::attempt($authenticator, Input::has('remember_me'))) {
            return Redirect::intended('/');
        }

        Session::flash('msg', Lang::get('locale.auth_incorrect'));
        return Redirect::to('login');
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
        return View::make('session.destroy');
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
