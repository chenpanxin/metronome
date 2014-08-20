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
            $at = new Metronome\Utils\At($content);

            $markdown = $at->content();
            $markup = Sanitization::make(Markdown::make($markdown));

            Eloquent::unguard();

            $reply = Reply::create([
                'user_id'  => Auth::user()->id,
                'topic_id' => $topic->id,
                'content'  => ''
            ]);

            $reply->text()->save(new Text([
                'markdown' => $markdown,
                'markup'   => $markup
            ]));

            $activity = new Metronome\Repositories\ActivityRepository;
            $activity->touch($topic)->replyEvent();

            if ($mentions = $at->mentions())
            {
                foreach ($mentions as $user) {
                    Queue::push(function($job) use ($user)
                    {
                        // Notify::mention($user);
                        $job->delete();
                    });
                }
            }
        }

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
            $markdown = (new Metronome\Utils\At(Input::get('content')))->content();
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

        $class = join('-', ['r', $reply->id]);

        $script = "\$('li.{$class}').fadeOut(200, function(){\$(this).remove();if($('ul.reply>li').size()==0){\$('ul.reply.index').parent().hide()}});";

        return Response::make($script, 200)->header('Content-Type', 'application/javascript');
    }
}
