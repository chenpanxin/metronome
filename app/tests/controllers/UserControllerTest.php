<?php

class UserControllerTest extends TestCase {

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->migrateAndSeed();
        $this->user = User::first();
        DB::beginTransaction();
    }

    public function testUserIndex()
    {
        $this->call('GET', 'users');
        $this->assertViewHas('users');
        $this->assertResponseOk();
    }

    public function testUserCreate()
    {
        $this->call('GET', 'signup');
        $this->assertResponseOk();
    }

    public function testUserStoreFailed()
    {
        // Input::replace([
        //     'username' => 'Ali',
        //     'password' => 'good_password',
        //     'email'    => 'not@email'
        // ]);

        // $mock = Mockery::mock('Metronome\Validators\UserValidator');
        // $mock->shouldReceive('fails')->andReturn(true);

        $this->call('POST', 'user/store');

        $this->assertHasOldInput();
        $this->assertSessionHas('message');
        $this->assertRedirectedTo('signup');
    }

    public function testUserShow()
    {
                // $this->app->instance('Post', $this->mock);
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

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
