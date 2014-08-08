<?php

class LikeController extends BaseController {

    public function __construct()
    {
        // $this->beforeFilter('csrf', ['on'=>'post']);
        $this->beforeFilter('auth', ['only'=>['store', 'destroy']]);
        $this->beforeFilter(function(){
            if (Request::ajax()) {

            }
        });
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);

        // $topic->likers()->get('liker_id');

        // $topic->likers()->save(new Metronome\Models\Liker);

        // Like::firstOrCreate([
        //     'user_id'  => Auth::user()->id,
        //     'topic_id' => $topic->id
        // ]);

        return Redirect::back();
    }

    public function destroy($id)
    {
        // $topic = Topic::findOrFail($id);

        // $like = Like::whereUserId(Auth::user()->id)->whereTopicId($topic->id)->first();

        // $like and $like->delete();

        return Redirect::back();
    }
}
