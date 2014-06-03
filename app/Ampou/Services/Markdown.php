<?php namespace Ampou\Services;

use Michelf\MarkdownExtra;

class Markdown {

    protected $text;

    public function __construct($text = null)
    {
        $this->text = $text ?: 'hello, text.';
    }

    public function html()
    {
        return MarkdownExtra::defaultTransform($this->text);
    }

    public function inverse()
    {
        return (new \Markdownify\ConverterExtra)->parseString($this->text);
    }
}

