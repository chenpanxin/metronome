<?php

class ReplyController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('csrf', [
            'on' => 'post'
        ]);
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);
        $validator = Validator::make(Input::all(), ['content'=>'required|min:2']);
        if ($validator->passes()) {
            $reply = new Reply;
            $reply->user_id = Auth::user()->id;
            $reply->topic_id = $topic->id;
            $reply->content = '';
            $reply->save();

            $reply->texts()->save(new Text(['markdown'=>'', 'markup'=>'']));
        }
        return Redirect::to('topic/'.$topic->id);
    }
}
