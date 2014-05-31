<?php

class TopicController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function index()
    {
        return View::make('topics.index')
            ->withTitle(Config::get('website.title'))
            ->withCategories(Category::all())
            ->withTopics(Topic::with('user', 'category')->orderBy('created_at', 'desc')->paginate(16));
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        $comments = $topic->comments;
        $comments->load('user', 'replies', 'replies.user');

        $topic->load('user', 'category');

        $markdown = new Ampou\Services\Markdown($topic->body);
        $topic_html = Ampou\Services\Sanitization::make($markdown->html());

        return View::make('topics.show')
            ->withTitle(join(' | ', [Config::get('website.title'), $topic->title]))
            ->withTopic($topic)
            ->withTopicHtml($topic_html)
            ->withComments($comments);
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
            Session::flash('msg', $validator->messages()->first());
            return Redirect::to('topic/new')
                ->withInput();
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
            Session::flash('msg', $validator->messages()->first());
            return Redirect::back();
        }

        if ($topic->user_id == Auth::user()->id) {
            $topic->update([
                'title'       => Input::get('title'),
                'body'        => Input::get('body'),
                'category_id' => Input::get('category_id')
            ]);
        }
        Session::flash('msg', Lang::get('locale.topic_updated'));
        return Redirect::back();
    }

    public function byCategory($id)
    {
        $topics = Topic::with('user', 'category')->whereCategoryId($id)->paginate(16);
        return View::make('topics.index')
            ->withTitle(Config::get('website.title'))
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function byComment()
    {
        $topics = Topic::with('user', 'category')->paginate(16);
        return View::make('topics.index')
            ->withTitle(Config::get('website.title'))
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function popular()
    {
        $topics = Topic::with('user')->paginate(16);
        return View::make('topics.index')
            ->withTitle(Config::get('website.title'))
            ->withCategories(Category::all())
            ->withTopics($topics);
    }

    public function newest()
    {
        return Redirect::to('/');
    }
}
