<?php namespace Ampou\Services;

use HTMLPurifier;

class Sanitization {

    protected $purifier;

    public function __construct()
    {
        $this->purifier = new HTMLPurifier();
    }

    public function sanitize($html)
    {
        return $this->purifier->purify($html);
    }

    public static function make($html)
    {
        return (new static())->sanitize($html);
    }
}
