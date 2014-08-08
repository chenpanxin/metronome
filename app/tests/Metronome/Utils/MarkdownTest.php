<?php namespace Metronome\Utils;

use TestCase;
use Markdown;

class MarkdownTest extends TestCase {

    public function testMake()
    {
        $html = <<<HTML
<blockquote>
<p>Markdown</p>
</blockquote>
HTML;
        $this->assertEquals($html, Markdown::make('> Markdown'));
    }
}
