<?php

class Photo extends Eloquent {

    protected $guarded = ['id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
