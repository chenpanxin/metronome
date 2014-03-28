<?php

class SessionController extends BaseController {

    public function __construct()
    {

    }

    public function create()
    {
        return View::make('users.login');
    }
}
