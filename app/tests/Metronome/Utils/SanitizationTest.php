<?php namespace Metronome\Utils;

use TestCase;
use Mockery;

class SanitizationTest extends TestCase {

    public function testSanitize()
    {
        $html = Sanitization::instance()->sanitize('<script>Console.log(\'Sanitization\')</script><p>Sanitization</p>');

        $this->assertEquals('<p>Sanitization</p>', $html);
    }
}
