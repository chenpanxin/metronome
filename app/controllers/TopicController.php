<?php

class TopicController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics(Topic::with('user')->paginate(16));
    }

    public function show($id)
    {
        $topic = Topic::with('user')->findOrFail($id);
        return View::make('topics.show')
            ->withTopic($topic);
    }

    public function create()
    {
        return View::make('topics.new')
            ->withCategories(Category::all());
    }

    public function store()
    {
        $topic = new Topic;
        $topic->category_id = 1;
        $topic->user_id = Auth::user()->id;
        $topic->title = Input::get('title');
        $topic->body = Input::get('body');
        $topic->save();
        return Redirect::to('/');
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
        return Redirect::to('/');
    }

    public function newest()
    {
        return Redirect::to('/');
    }
}
