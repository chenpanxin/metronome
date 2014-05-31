<?php namespace Admin;

use BaseController;
use View;

class CategoryController extends BaseController {

    public function create()
    {
        return View::make('admin.category.new');
    }

}
