<?php

class UserController extends BaseController {

    public function create()
    {
        return View::make('users.signup');
    }
}