<?php namespace Crayon\Utils;

use Parsedown;

class Markdown {

    protected $parser;

    public function __construct()
    {
        $this->parser = new Parsedown();
    }

    public function make($input)
    {
        return $this->parser->text($input);
    }
}
