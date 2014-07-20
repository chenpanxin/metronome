<?php

class AliasController extends BaseController {

    public function index()
    {
        return Redirect::to('/');
    }

    public function users()
    {
        return Redirect::to('users');
    }

    public function signup()
    {
        return Redirect::to('signup');
    }

    public function login()
    {
        return Redirect::to('login');
    }
}
