<?php

class Topic extends Eloquent {

    protected $fillable = ['category_id', 'title', 'body'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
