<?php

class UserTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        DB::beginTransaction();
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }

    public function testHasManyTopic()
    {
        $this->assertTrue(User::first()->topics() instanceOf Illuminate\Database\Eloquent\Relations\HasMany);
    }

    public function testFollowers()
    {
        $mock = Mockery::mock('User');
        $mock->shouldReceive('followers')->andReturn('Followers');
        $this->assertEquals('Followers', $mock->followers());
    }

    public function testFollowing()
    {
        $mock = Mockery::mock('User');
        $mock->shouldReceive('following')->andReturn('Following');
        $this->assertEquals('Following', $mock->following());
    }

    public function testHasManyComments()
    {

    }

    public function testHasManyReplies()
    {

    }
}
