<?php

class TopicController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics(Topic::with('user')->orderBy('created_at', 'desc')->paginate(16));
    }

    public function show($id)
    {
        $topic = Topic::with('user')->findOrFail($id);

        $markdown = new Ampou\Services\Markdown($topic->body);
        $topic_html = Ampou\Services\Sanitization::make($markdown->html());

        $comments = Comment::with('replies')->whereTopicId($topic->id)->get();

        return View::make('topics.show')
            ->withTopicHtml($topic_html)
            ->withComments($comments)
            ->withTopic($topic);
    }

    public function create()
    {
        return View::make('topics.new')
            ->withCategories(Category::all());
    }

    public function store()
    {
        $validator = new Ampou\Validators\TopicValidator;

        if ($validator->fails()) {
            return Redirect::back();
        }

        $topic = new Topic([
            'category_id' => Input::get('category_id'),
            'title'       => Input::get('title'),
            'body'        => Input::get('body')
        ]);

        Auth::user()->topics()->save($topic);
        return Redirect::to('/');
    }

    public function edit($id)
    {
        $topic = Topic::with('category')->findOrFail($id);
        return View::make('topics.edit')
            ->withCategories(Category::all())
            ->withTopic($topic);
    }

    public function update($id)
    {
        $topic = Topic::findOrFail($id);

        $validator = new Ampou\Validators\TopicValidator;

        if ($validator->fails()) {
            return Redirect::back();
        }

        if ($topic->user_id == Auth::user()->id) {
            $topic->update([
                'title'       => Input::get('title'),
                'body'        => Input::get('body'),
                'category_id' => Input::get('category_id')
            ]);
        }
        return Redirect::back();
    }

    public function byCategory($id)
    {
        $topics = Topic::with('user')->whereCategoryId($id)->paginate(16);
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function byComment()
    {
        $topics = Topic::with('user')->paginate(16);
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function popular()
    {
        $topics = Topic::with('user')->paginate(16);
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function newest()
    {
        return Redirect::to('/');
    }
}
