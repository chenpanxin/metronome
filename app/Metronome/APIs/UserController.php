<?php namespace Metronome\APIs;

use BaseController;
use View;
use User;

class UserController extends BaseController {

    public function index()
    {
        return User::all();
    }

    public function show($username)
    {
        return User::whereUsername($username)->first();
    }
}
