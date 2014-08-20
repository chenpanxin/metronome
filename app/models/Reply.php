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

    public function text()
    {
        return $this->morphOne('Text', 'textable');
    }
}
