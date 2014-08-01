<?php

class UserControllerTest extends TestCase {

    public function setUp()
    {
        // parent::setUp();
        // Artisan::call('migrate');
        // DB::beginTransaction();
        // Artisan::call('db:seed');
    }

    public function tearDown()
    {
        // DB::rollback();
        // Mockery::close();
    }

    public function testUserIndex()
    {
        // $this->app->instance('Post', $this->mock);
        // $this->call('GET', 'users');
        // $this->assertViewHas('users');
        // $this->assertResponseOk();
    }

    public function testUserCreate()
    {
        // $this->call('GET', 'signup');
        // $this->assertResponseOk();
    }

    public function testUserStore()
    {
        // $this->call('POST', 'user/store');
        // $this->assertRedirectedTo('signup');
    }

    public function testUserShow()
    {
        // $username = User::first()->username;
        // $this->action('GET', 'UserController@show', ['username'=>$username]);
        // $this->assertResponseOk();
    }

    public function testUserEdit()
    {
        // $this->call('GET', 'settings/password');
        // $this->assertResponseOk();
    }

    public function testUserProfileEdit()
    {
        // $this->be(User::first());
        // $this->call('GET', 'settings/profile');
        // $this->assertViewHas('user');
        // $this->assertResponseOk();
    }

    public function testUserFollowing()
    {
        // $username = User::first()->username;
        // $this->action('GET', 'UserController@following', ['username'=>$username]);
        // $this->assertResponseOk();
    }

    public function testUserFollowers()
    {
        // $username = User::first()->username;
        // $this->action('GET', 'UserController@followers', ['username'=>$username]);
        // $this->assertResponseOk();
    }
}
