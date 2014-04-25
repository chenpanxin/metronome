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
        $validator = new Ampou\Validators\UserValidator;

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator->errors());
        }

        $user = new User([
            'email'    => Input::get('email'),
            'username' => Input::get('username')
        ]);
        $user->password = Hash::make(Input::get('password'));
        $user->avatar_url = Str::avatar_url($user->email);

        if ($user->save()) {
            Auth::login($user);
            return Redirect::to('/');
        }
        return Redirect::back();
    }

    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        if ($user) {
            return View::make('users.show')
                ->withUser($user);
        }
        App::abort();
    }

    public function profileEdit()
    {
        return View::make('users.profile.edit');
    }

    public function profileUpdate()
    {

    }

    public function edit()
    {
        return View::make('users.edit');
    }

    public function update()
    {

    }

    public function notify()
    {
        return Redirect::to('settings/profile');
    }

    public function topics($username)
    {
        $user = User::with('Topics')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.topics')
                ->withUser($user);
        }
        App::abort();
    }
}
