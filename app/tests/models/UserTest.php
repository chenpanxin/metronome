<?php

class UserTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }

    public function testHasOneProfile()
    {

    }

    public function testFollowers()
    {
        // $mock = Mockery::mock('User');
        // $mock->shouldReceive('followers')->andReturn('Followers');
        // $this->assertEquals('Followers', $mock->followers());
    }

    public function testFollowing()
    {
        // $mock = Mockery::mock('User');
        // $mock->shouldReceive('following')->andReturn('Following');
        // $this->assertEquals('Following', $this->userCreator()->following());
    }

    public function testHasManyTopics()
    {
        // $this->assertTrue($this->userCreator()->topics() instanceOf Illuminate\Database\Eloquent\Relations\HasMany);
    }

    public function testHasManyComments()
    {

    }

    public function testHasManyReplies()
    {

    }
}
