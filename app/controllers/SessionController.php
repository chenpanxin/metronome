<?php

class SessionController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on'=>['post', 'put', 'patch', 'delete']]);
    }

    public function create()
    {
        if (Auth::check()) return Redirect::home();

        return View::make('session.new')
            ->withTitle(Lang::get('locale.login'));
    }

    public function store()
    {
        $authenticator = Str::contains(Input::get('account'), '@')
            ? array_only($this->params(), ['email', 'password'])
            : array_only($this->params(), ['username', 'password']);

        if (Auth::attempt($authenticator, Input::has('remember_me')))
        {
            Event::fire('user.stat', [$user = Auth::user(), true]);

            if (! $user->save()) Auth::logout();

            return Redirect::intended('/');
        }

        Session::flash('message', Lang::get('locale.auth_incorrect'));

        return Redirect::to('login');
    }

    public function destroy()
    {
        if (Auth::check()) Auth::logout();

        return Redirect::home();
    }

    public function logout()
    {
        return View::make('session.destroy')
            ->withTitle(Lang::get('locale.logout'));
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
