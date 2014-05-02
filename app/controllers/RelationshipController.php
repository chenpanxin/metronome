<?php

class RelationshipController extends BaseController {

    public function store()
    {
        $followed = User::whereUsername(Input::get('target'))->first();

        if ($followed) {
            $user = Auth::user();

        }
    }

    public function destroy()
    {

    }
}
