<?php namespace Crayon\Layers;

use BaseController;
use Category;
use Input;
use Redirect;
use View;

class CategoryController extends BaseController {

    public function index()
    {
        return View::make('backend.category.index')
            ->withCategories(Category::all());
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return View::make('backend.category.edit')
            ->withCategory($category);
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);

        $category->name = Input::get('name');
        $category->save();

        return Redirect::to('admin/categories');
    }
}
