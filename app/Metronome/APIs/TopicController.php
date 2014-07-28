<?php namespace Metronome\APIs;

use BaseController;
use View;
use Topic;

class TopicController extends BaseController {

    public function index()
    {
        return Topic::all();
    }

    public function show($id)
    {
        return Topic::find($id);
    }
}
