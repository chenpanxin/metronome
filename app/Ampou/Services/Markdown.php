<?php namespace Ampou\Services;

use \Michelf\MarkdownExtra;

class Markdown {

    protected $html;

    public function __construct($text = null)
    {
        $this->html = MarkdownExtra::defaultTransform($text ?: 'hello, markdown.');
    }

    public function html()
    {
        return $this->html;
    }
}

