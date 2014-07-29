<?php namespace Metronome\Models;

use Eloquent;

class Blog extends Eloquent {

    protected $table = 'posts';
    protected $fillable = ['slug'];

    public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }

    public function likers()
    {
        return $this->morphToMany('Metronome\Models\Liker', 'likeable');
    }
}
