<?php namespace Metronome\Layers;

use Lang;
use View;
use Input;
use Topic;
use Redirect;

class TopicController extends BaseController {

    public function index()
    {
        return View::make('backend.topic.index')
            ->withTitle(Lang::get('locale.topic'))
            ->withTopics(Topic::all());
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);

        return View::make('backend.topic.edit')
            ->withTitle(Lang::get('locale.edit_topic'))
            ->withTopic($topic);
    }

    public function update($id)
    {
        $topic = Topic::findOrFail($id);

        $topic->update([
            'category_id' => Input::get('category_id'),
            'title'       => Input::get('title'),
            'body'        => Input::get('body')
        ]);

        return Redirect::to('admin');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);

        $topic->category->decrement('topics_count');
        $topic->delete();

        return Redirect::back();
    }
}
