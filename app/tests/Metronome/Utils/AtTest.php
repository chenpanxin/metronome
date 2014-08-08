<?php namespace Metronome\Utils;

use TestCase;

class AtTest extends TestCase {

    protected $at;

    public function setUp()
    {
        parent::setUp();
        $this->at = new At('@Suzy @ChoA @J-Min Hello, world.');
    }

    public function testMentions()
    {
        $this->assertEquals(['Suzy', 'ChoA'], $this->at->mentions());
    }

    public function testContent()
    {
        $this->assertEquals('<a href="/Suzy">@Suzy</a> <a href="/ChoA">@ChoA</a> @J-Min Hello, world.', $this->at->content());
    }
}
