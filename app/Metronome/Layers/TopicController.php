<?php namespace Metronome\Layers;

use BaseController;
use View;
use Topic;
use Redirect;

class TopicController extends BaseController {

    public function index()
    {
        return View::make('backend.topic.index')
            ->withTopics(Topic::all());
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);

        return View::make('backend.topic.edit')
            ->withTopic($topic);
    }

    public function update($id)
    {
        $topic = Topic::findOrFail($id);

        return Redirect::to('admin');
    }

    public function destroy($id)
    {
        return Redirect::back();
    }
}
