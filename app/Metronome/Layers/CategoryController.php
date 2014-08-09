<?php namespace Metronome\Layers;

use Metronome\Validators\CategoryValidator;
use Category;
use Lang;
use Input;
use Topic;
use Validator;
use Redirect;
use Session;
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
        $validator = new CategoryValidator;

        if ($validator->fails())
        {
            Session::flash('message', $validator->messages()->first());
            return Redirect::to('admin/categories')
                ->withInput();
        }

        Category::create([
            'name' => Input::get('name'),
            'slug' => Input::get('slug')
        ]);

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

        $validator = Validator::make(Input::all(), [
            'name' => 'required|min:2|unique:categories,name,'.$category->id,
            'slug' => 'required|unique:categories,slug,'.$category->id
        ]);

        if ($validator->fails())
        {
            Session::flash('message', $validator->messages()->first());
            return Redirect::to('admin/category/'.$category->id.'/edit')
                ->withInput();
        }

        $category->update([
            'name' => Input::get('name'),
            'slug' => Input::get('slug')
        ]);

        return Redirect::to('admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->topics_count == 0)
        {
            $category->delete();
        }
        else
        {
            $uncategoried = Category::whereName(Lang::get('locale.uncategoried'))
                ->orWhere('slug', 'uncategoried')
                ->first();

            if (! $uncategoried)
            {
                $uncategoried = Category::create([
                    'name' => Lang::get('locale.uncategoried'),
                    'slug' => 'uncategoried'
                ]);
            }

            if ($category == $uncategoried)
            {
                Session::flash('message', Lang::get('locale.uncategoried_not_null'));
            }
            else
            {
                $count = Topic::whereCategoryId($category->id)->update(['category_id'=>$uncategoried->id]);

                $uncategoried->topics_count += $count;
                $uncategoried->save();

                $category->delete();
            }
        }

        return Redirect::back();
    }
}
