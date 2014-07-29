<?php

class Tag extends Eloquent {

    public function posts()
    {
        return $this->morphedByMany('Metronome\Models\Blog', 'taggable');
    }

    public function topics()
    {
        return $this->morphedByMany('Topic', 'taggable');
    }
}
