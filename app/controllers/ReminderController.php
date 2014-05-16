<?php

class ReminderController extends Controller {

    public function getRemind()
    {
        return View::make('users.remind');
    }

    public function postRemind()
    {
        switch ($response = Password::remind(Input::only('email')))
        {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::REMINDER_SENT:
                return Redirect::back()->with('status', Lang::get($response));
        }
    }

    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('users.password.reset')->with('token', $token);
    }

    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/');
        }
    }
}
