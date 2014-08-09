<?php

class Category extends Eloquent {

    protected $fillable = ['name', 'slug'];

    public function topics()
    {
        return $this->hasMany('Topic');
    }
}
