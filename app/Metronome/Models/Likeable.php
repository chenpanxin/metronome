<?php namespace Metronome\Models;

use Eloquent;
use DateTime;

class Likeable extends Eloquent {

    protected $fillable = ['likeable_type', 'likeable_id', 'liker_id'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {
            $model->created_at = new DateTime;
        });
    }
}
