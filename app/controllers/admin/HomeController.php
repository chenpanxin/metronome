<?php namespace Admin;

use BaseController;
use View;
use Category;
use Redirect;
use Input;

class HomeController extends BaseController {

    public function index()
    {
        return View::make('admin.home');
    }

}
