<?php

class Reply extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

    public function texts()
    {
        return $this->morphMany('Text', 'textable');
    }
}
