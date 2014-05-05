<?php

class LikeController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if (Auth::guest()) {
                return Response::json(['msg'=>'login_required', 'code'=>'94401']);
            }
        });
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);
        $user = Auth::user();
        Like::firstOrCreate([
            'user_id'  => $user->id,
            'topic_id' => $topic->id
        ]);
        // return Response::json([]);
        return Like::all();
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $user = Auth::user();
        $like = Like::whereUserId($user->id)
            ->whereTopicId($topic->id)
            ->first();

        if ($like) {
            $like->delete();
        }

        // return Response::json([]);
        return Like::all();
    }
}
