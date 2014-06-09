<?php namespace Busker;

use BaseController;
use View;
use Topic;

class TopicController extends BaseController {

    public function index()
    {
        return View::make('busker.topic.index')->with([
            'topics' => Topic::all()
        ]);
    }
}
