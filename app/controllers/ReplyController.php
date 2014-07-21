<?php

class ReplyController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on'=>'delete']);
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
            $markdown = (new Crayon\Utils\At($content))->getContent();
            $markup = Sanitization::make(Markdown::make($markdown));

            $reply = new Reply;
            $reply->user_id = Auth::user()->id;
            $reply->topic_id = $topic->id;
            $reply->content = '';
            $reply->save();

            $reply->texts()->save(new Text([
                'markdown' => $markdown,
                'markup'   => $markup
            ]));
        }

        return Redirect::to('topic/'.$topic->id);
    }

    public function edit($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->load('topic', 'topic.user');

        return View::make('reply.edit')
            ->withTitle('sfsdf')
            ->withReply($reply);
    }

    public function update($id)
    {
        $reply = Reply::findOrFail($id);

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
