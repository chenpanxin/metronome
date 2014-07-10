<?php namespace Busker;

use BaseController;
use View;
use Category;
use Topic;
use Redirect;
use Input;

class HomeController extends BaseController {

    public function index()
    {
        $topics = Topic::all();
        return View::make('busker.home', [
            'topics' => $topics
        ]);
    }
}
