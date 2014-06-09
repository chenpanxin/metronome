<?php namespace Busker;

use BaseController;
use View;
use Redirect;
use Topic;

class TopicController extends BaseController {

    public function index()
    {
        return View::make('busker.topic.index')->with([
            'topics' => Topic::all()
        ]);
    }

    public function show()
    {
        return View::make('busker.topic.show');
    }

    public function destroy($topic)
    {
        Topic::destroy($topic);
        return Redirect::to('admin');
    }
}
