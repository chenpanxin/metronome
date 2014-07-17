<?php

class Reply extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comment()
    {
        return $this->belongsTo('Comment');
    }

    public function texts()
    {
        return $this->morphMany('Text', 'textable');
    }
}
