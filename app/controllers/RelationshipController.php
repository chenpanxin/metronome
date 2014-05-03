<?php

class RelationshipController extends BaseController {

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
