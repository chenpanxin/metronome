<?php

class TextTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        var_dump(static::$migrated);
        if (! static::$migrated)
        {
            $this->migrateAndSeed();
            static::$migrated = true;
        }
        var_dump(static::$migrated);
    }

    public function testTextable()
    {
        $text = App::make('Text');
        $this->assertTrue($text->textable() instanceOf Illuminate\Database\Eloquent\Relations\MorphTo);

        var_dump(User::first());
    }
}
