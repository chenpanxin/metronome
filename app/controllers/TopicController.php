<?php

class TopicController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', [
            'only' => ['create', 'store', 'edit', 'update']
        ]);
        $this->beforeFilter('csrf', [
            'on' => 'post'
        ]);
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

        $following_count = Relationship::whereFollowerId($topic->user->id)->count();
        $followers_count = Relationship::whereFollowedId($topic->user->id)->count();

        $likers = Like::whereTopicId($topic->id)->lists('user_id');

        $liking = in_array(Auth::user()->id, $likers);

        $likers_count = count($likers);

        $topics_count = $topic->user->topics()->count();

        return View::make('topics.show')
            ->with([
                'following_count' => $following_count,
                'followers_count' => $followers_count,
                'topics_count'    => $topics_count,
                'likers_count'    => $likers_count,
                'liking'          => $liking
            ])
            ->withTitle(join(' | ', [Config::get('website.title'), $topic->title]))
            ->withTopic($topic)
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

        $markdown = new Ampou\Services\Markdown(Input::get('body'));

        $topic = new Topic([
            'category_id' => Input::get('category_id'),
            'title'       => Input::get('title'),
            'body'        => Ampou\Services\Sanitization::make($markdown->html())
        ]);

        $text = new Text([
            'content' => Input::get('body')
        ]);

        Auth::user()->topics()->save($topic);
        $topic->texts()->save($text);

        return Redirect::to('/');
    }

    public function edit($id)
    {
        $topic = Topic::with('category')->findOrFail($id);
        $topic->body = $topic->texts()->first()->content;

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

            $markdown = new Ampou\Services\Markdown(Input::get('body'));

            $topic->update([
                'category_id' => Input::get('category_id'),
                'title'       => Input::get('title'),
                'body'        => Ampou\Services\Sanitization::make($markdown->html())
            ]);

            $text = $topic->texts()->first();
            $text->content = Input::get('body');
            $text->save();
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
