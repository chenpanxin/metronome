<?php

class Text extends Eloquent {

    protected $fillable = ['markup', 'markdown'];

    public function textable()
    {
        return $this->morphTo();
    }
}
