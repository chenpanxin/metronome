<?php namespace Busker;

use BaseController;
use View;

class UserController extends BaseController {

    public function index()
    {
        return View::make('busker.user.index')
            ->withUsers([]);
    }
}
