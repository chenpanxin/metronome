<?php namespace Crayon\Layers;

use BaseController;
use View;

class UserController extends BaseController {

    public function index()
    {
        return View::make('backend.user.index');
    }

}
