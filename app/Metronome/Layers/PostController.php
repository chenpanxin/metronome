<?php namespace Metronome\Layers;

use App;
use Str;
use View;
use Input;
use Topic;
use Redirect;
use Metronome\Models\Blog;

class PostController extends BaseController {

    public function store()
    {
        if (! $topic_id = Input::get('topic_id')) App::abort();

        $topic = Topic::findOrFail($topic_id);

        if (! $topic) App::abort();

        $topic->blog()->save(new Blog([
            'slug' => 'post-'.strtolower(Str::random(8))
        ]));

        return Redirect::back();
    }

    public function show($slug)
    {
        $post = Blog::whereSlug($slug)->first();

        if (! $post) App::abort();

        $post->load('topic', 'topic.user', 'topic.texts');

        $post->title = $post->topic->title;
        $post->body = $post->topic->texts->first()->markup;
        $post->user = $post->topic->user;

        return View::make('blog.index')
            ->withTitle($post->title)
            ->withPost($post);
    }
}
