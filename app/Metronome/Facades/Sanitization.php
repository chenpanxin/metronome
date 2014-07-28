<?php namespace Metronome\Facades;

use Illuminate\Support\Facades\Facade;

class Sanitization extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'sanitization';
    }
}
