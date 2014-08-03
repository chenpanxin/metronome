<?php

class Stat extends Eloquent {

    protected $table = 'user_stats';

    public function user()
    {
        return $this->belongsTo('User');
    }
}
