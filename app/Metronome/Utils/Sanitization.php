<?php namespace Metronome\Utils;

use HTMLPurifier;

class Sanitization {

    protected $purifier;
    protected static $instance;

    public function __construct()
    {
        $this->purifier = new HTMLPurifier();
    }

    public function sanitize($input)
    {
        return $this->purifier->purify($input);
    }

    public static function instance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function make($html = null)
    {
        $input = $html ?: '';
        return $this->sanitize($input);
    }
}
