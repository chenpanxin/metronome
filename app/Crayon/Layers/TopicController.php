<?php namespace Crayon\Layers;

use BaseController;
use View;
use Topic;

class TopicController extends BaseController {

    public function index()
    {
        return View::make('backend.topic.index')
            ->withTopics(Topic::all());
    }
}
