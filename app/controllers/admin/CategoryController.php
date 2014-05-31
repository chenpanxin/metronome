<?php namespace Admin;

use BaseController;
use View;
use Category;
use Redirect;
use Input;

class CategoryController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('staff');
    }

    public function create()
    {
        return View::make('admin.category.new');
    }

    public function store()
    {
        $category = new Category;
        $category->name = Input::get('name');
        $category->slug = str_random(32);
        $category->description = '';
        $category->save();

        return Redirect::to('/');
    }
}
