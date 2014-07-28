<?php namespace Metronome\Layers;

use Category;
use Lang;
use Input;
use Redirect;
use View;

class CategoryController extends BaseController {

    public function index()
    {
        return View::make('backend.category.index')
            ->withTitle(Lang::get('locale.category'))
            ->withCategories(Category::all());
    }

    public function store()
    {
        $category = new Category;
        $category->name = Input::get('name');
        $category->slug = Input::get('name');
        $category->save();

        return Redirect::back();
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

    public function destroy($id)
    {
        Category::destroy($id);

        return Redirect::back();
    }
}
