<?php namespace Busker;

use BaseController;
use View;
use Category;
use Redirect;
use Input;
use Session;
use Ampou\Validators\CategoryValidator;

class CategoryController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('staff');
    }

    public function index()
    {
        return View::make('busker.category.index');
    }

    public function create()
    {
        return View::make('busker.category.new');
    }

    public function store()
    {
        $validator = new CategoryValidator;

        if ($validator->fails()) {
            Session::flash('msg', $validator->messages()->first());
            return Redirect::back()
                ->withInput();
        }

        $category = new Category;
        $category->name = Input::get('name');
        $category->slug = Input::get('slug');
        $category->save();

        return Redirect::to('/');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return View::make('busker.category.edit')
            ->withCategory($category);
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);

        $validator = new CategoryValidator;

        if ($validator->fails()) {
            Session::flash('msg', $validator->messages()->first());
            return Redirect::back()
                ->withInput();
        }

        $category->name = Input::get('name');
        $category->slug = Input::get('slug');
        $category->save();

        return Redirect::to('admin');
    }

    public function destroy($id)
    {

    }
}
