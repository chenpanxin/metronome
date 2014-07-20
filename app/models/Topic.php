<?php

class Topic extends Eloquent {

    protected $fillable = ['category_id', 'title', 'body'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }

    public function texts()
    {
        return $this->morphMany('Text', 'textable');
    }

    public function likers()
    {
        return $this->belongsToMany('User', 'likes');
    }
}
