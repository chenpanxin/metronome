<?php

class ReplyController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on'=>['post', 'put', 'patch', 'delete']]);
        $this->beforeFilter('auth', []);
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);

        $content = Input::get('content');

        $validator = Validator::make(
            ['content' => $content],
            ['content' => 'required|min:2']
        );

        if ($validator->passes()) {
            $markdown = (new Metronome\Utils\At($content))->getContent();
            $markup = Sanitization::make(Markdown::make($markdown));

            Eloquent::unguard();

            $reply = Reply::create([
                'user_id'  => Auth::user()->id,
                'topic_id' => $topic->id,
                'content'  => ''
            ]);

            $reply->texts()->save(new Text([
                'markdown' => $markdown,
                'markup'   => $markup
            ]));
        }

        $activity = new Metronome\Repositories\ActivityRepository;
        $activity->touch($topic)->replyEvent();

        return Redirect::to('topic/'.$topic->id);
    }

    public function edit($id)
    {
        $reply = Reply::findOrFail($id);

        if ($reply->user_id != Auth::user()->id) {
            return Redirect::to('topic/'.$reply->topic_id);
        }

        $reply->load('topic', 'topic.user');
        $reply->content = $reply->texts()->first()->markdown;

        return View::make('reply.edit')
            ->withTitle(Lang::get('locale.edit_reply'))
            ->withReply($reply);
    }

    public function update($id)
    {
        $reply = Reply::findOrFail($id);

        if ($reply->user_id == Auth::user()->id) {
            $markdown = (new Metronome\Utils\At(Input::get('content')))->getContent();
            $markup = Sanitization::make(Markdown::make($markdown));

            $text = $reply->texts()->first();
            $text->markdown = $markdown;
            $text->markup = $markup;
            $text->save();
        }

        return Redirect::back();
    }

    public function destroy($id)
    {
        $reply = Reply::findOrFail($id);

        if (Auth::user()->id == $reply->user_id) {
            $reply->delete();
        }

        return Redirect::back();
    }
}
