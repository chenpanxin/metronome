<?php

class Text extends Eloquent {

    protected $fillable = ['content'];

    public function markdownable()
    {
        return $this->morphTo();
    }
}
