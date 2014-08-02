<?php

class TextTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        $this->migrateAndSeed();
    }

    public function testTextable()
    {
        $text = App::make('Text');
        $this->assertTrue($text->textable() instanceOf Illuminate\Database\Eloquent\Relations\MorphTo);
    }
}
