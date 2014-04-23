<?php

class TopicController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics(Topic::with('user')->get());
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
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

    public function category($id)
    {
        $topics = Topic::with('user')->whereCategoryId($id)->get();
        return View::make('topics.index')
            ->withCategories(Category::all())
            ->withTopics($topics);
    }
}
