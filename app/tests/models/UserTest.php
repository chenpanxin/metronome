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
}
