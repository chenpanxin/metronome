<?php

class Comment extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }
}
