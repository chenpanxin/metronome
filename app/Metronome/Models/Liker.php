<?php namespace Metronome\Models;

use Eloquent;

class Liker extends Eloquent {

    protected $table = 'users';

    public function posts()
    {
        return $this->morphedByMany('Metronome\Models\Blog', 'likeable');
    }

    public function topics()
    {
        return $this->morphedByMany('Topic', 'likeable');
    }
}
