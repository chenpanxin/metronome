<?php namespace Metronome\Layers;

use TestCase;
use Mockery;
use DB;

class TopicControllerTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        $this->migrateAndSeed();
        DB::beginTransaction();
    }

    public function testIndex()
    {
        $this->call('GET', 'admin');
        $this->assertViewHas('topics');
        $this->assertViewHas('title');
        $this->assertResponseOk();
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
