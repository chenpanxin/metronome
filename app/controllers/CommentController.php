<?php

class CommentController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);
        $validator = Validator::make(Input::all(), ['content'=>'required|min:12']);
        if ($validator->passes()) {
            $comment = new Comment(['content'=>Input::get('content')]);
            $comment->user_id = Auth::user()->id;
            $topic->comments()->save($comment);
        }
        return Redirect::to('topic/'.join('#comment-', [$topic->id, $comment->id]));
    }

    public function update($id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->content = Input::get('content');
        $comment->save();
        return Redirect::back();
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
