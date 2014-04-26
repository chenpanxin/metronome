<?php

class Relationship extends Eloquent {

    public $timestamps = false;

    public function follower()
    {
        return $this->belongsTo('User', 'follower_id');
    }

    public function followed()
    {
        return $this->belongsTo('User', 'followed_id');
    }
}
