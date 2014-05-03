<?php

class RelationshipController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if (Auth::guest()) {
                return Response::json(['msg'=>'login_required', 'code'=>'94401']);
            }
        });
    }

    public function show()
    {
        $followed = User::whereUsername(Input::get('target'))->first();
        if ($followed and Relationship::whereFollowedId($followed->id)
            ->whereFollowerId(Auth::user()->id)
            ->first()) {
            return Response::json(['msg'=>'followed', 'code'=>'94200', 'replace'=>Lang::get('locale.unfollow')]);
        }
        return Response::json(['msg'=>'not_followed', 'code'=>'94404']);
    }

    public function store()
    {
        $followed = User::whereUsername(Input::get('target'))->first();
        $follower = Auth::user();

        if ($followed and $follower->id != $followed->id) {
            Relationship::firstOrCreate([
                'followed_id' => $followed->id,
                'follower_id' => $follower->id
            ]);
            return Response::json(['msg'=>Lang::get('locale.unfollow'), 'code'=>'94200']);
        }
        return Response::json(['msg'=>'failed', 'code'=>'94400']);
    }

    public function destroy()
    {
        $followed = User::whereUsername(Input::get('target'))->first();
        $follower = Auth::user();

        if ($followed and $follower->id != $followed->id) {
            $relationship = Relationship::whereFollowedId($followed->id)
                ->whereFollowerId($follower->id)
                ->first();

            if ($relationship) {
                $relationship->delete();
            }
            return Response::json(['msg'=>Lang::get('locale.follow'), 'code'=>'94200']);
        }
        return Response::json(['msg'=>'failed', 'code'=>'94400']);
    }
}
