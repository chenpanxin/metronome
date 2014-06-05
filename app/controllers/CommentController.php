<?php

class CommentController extends BaseController {

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
            $comment = new Comment(['content'=>Input::get('content')]);
            $comment->user_id = Auth::user()->id;
            $topic->comments()->save($comment);
            return Redirect::to('topic/'.join('#comment-', [$topic->id, $comment->id]));
        }
        return Redirect::to('topic/'.$topic->id);
    }

    public function edit($id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        if ($comment->user == Auth::user()) {

        }
        return View::make('comments.edit')
            ->withComment($comment);
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);

        $validator = Validator::make(Input::all(), ['content'=>'required|min:2']);

        if ($validator->fails()) {
            Session::flash('msg', $validator->messages()->first());
            return Redirect::back();
        }

        $comment->content = Input::get('content');
        $comment->save();

        return Redirect::to('topic/'.$comment->topic->id);
    }

    public function destroy($id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        if ($comment->user->id == Auth::user()->id) {
            $comment->delete();
        }
        return Response::json(['comments_count'=>0]);
    }
}
