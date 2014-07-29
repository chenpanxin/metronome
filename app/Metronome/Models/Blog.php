<?php namespace Metronome\Models;

use Eloquent;

class Blog extends Eloquent {

    protected $table = 'posts';
    protected $fillable = ['slug'];

    public function topic()
    {
        return $this->belongsTo('Topic');
    }
}
