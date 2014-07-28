<?php namespace Metronome\Layers;

use View;
use User;

class UserController extends BaseController {

    public function index()
    {
        return View::make('backend.user.index')
            ->withUsers(User::all());
    }

}
