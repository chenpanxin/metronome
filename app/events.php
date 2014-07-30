<?php

Event::listen('auth.login', function(User $user)
{
    /**
     * Call this before using Auth::login($user) to set sessions
     */
    $user->last_logged_ip = Request::getClientIp();
    $user->last_logged_at = new DateTime;
});

Event::listen('profile.create', function(User $user)
{
    $user->profile()->save(new Profile(['verify_token'=>Str::random(64)]));
});





// View::composer(['topics.*', 'users.*'], function($view)
// {
//     $view->with('stat', Stat::orderBy('id', 'desc')->first());
// });
