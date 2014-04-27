<?php

class Category extends Eloquent {

    public function topics()
    {
        return $this->hasMany('Topic');
    }
}
