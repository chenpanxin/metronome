<?php

class LikeController extends BaseController {

    public function __construct()
    {
        // $this->beforeFilter('csrf', ['on'=>'post']);
        // $this->beforeFilter('auth', ['only'=>['store', 'destroy']]);
        $this->beforeFilter(function(){
            // if (Request::ajax()) {
            //     App::abort(404);
            // }
        });
    }

    public function store($id)
    {
        $topic = Topic::findOrFail($id);

        if (! $topic) App::abort(404);

        $likeable = Metronome\Models\Likeable::firstOrCreate([
            'likeable_type' => 'Topic',
            'likeable_id'   => $topic->id,
            'liker_id'      => Auth::user()->id,
        ]);

        return Response::json(['code'=>'94200', 'message'=>'successfully']);
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);

        if (! $topic) App::abort(404);

        $likeable = Metronome\Models\Likeable::whereLikerId(Auth::user()->id)
            ->whereLikeableId($topic->id)
            ->whereLikeableType('Topic')
            ->first();

        if ($likeable)
        {
            $likeable->delete();
        }

        return Response::json(['code'=>'94200', 'message'=>'successfully']);
    }
}
