<?php

/**
 * Text Table Schema Information
 * -----------------------------
 * id
 * textable_id
 * textable_type
 * markdown
 * markup
 * created_at
 * updated_at
 */

class TextTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        $this->migrateAndSeed();
        DB::beginTransaction();
    }

    public function testTextable()
    {
        $text = App::make('Text');
        $this->assertTrue($text->textable() instanceOf Illuminate\Database\Eloquent\Relations\MorphTo);
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
