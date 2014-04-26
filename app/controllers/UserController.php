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

        if ($user->save() and $user->profile()->save(new Profile)) {
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
        return View::make('users.profile.edit')
            ->withProfile(Auth::user()->profile);
    }

    public function profileUpdate()
    {
        Auth::user()->profile->update([
            'nickname'      => Input::get('nickname'),
            'location'      => Input::get('location'),
            'school'        => Input::get('school'),
            'contact_email' => Input::get('contact_email'),
            'biography'     => Input::get('biography')
        ]);

        return Redirect::to('settings/profile');
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

    public function following($username)
    {
        $user = User::with('following')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.following')
                ->withUser($user);
        }
        App::abort();
    }

    public function followers($username)
    {
        $user = User::with('followers')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.followers')
                ->withUser($user);
        }
        App::abort();
    }
}
