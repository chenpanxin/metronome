<?php

class SearchController extends BaseController {

    public function index()
    {
        return View::make('search.index')
            ->withTopics(Topic::search(Input::get('q')))
            ->withTitle(Lang::get('locale.search'));
    }

    public function store()
    {
        return Redirect::to('search?q='.Input::get('keyword'));
    }
}
