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
        $this->assertViewHas('title');
        $this->assertResponseOk();
    }

    public function testUserCreate()
    {
        $this->call('GET', 'signup');
        $this->assertResponseOk();
    }

    public function testUserCreateAfterSessionCreated()
    {
        $this->be($this->user);
        $this->call('GET', 'signup');
        $this->assertRedirectedToRoute('home');
    }

    public function testUserStoreFailed()
    {
        Validator::shouldReceive('make')->once()->andReturn(Mockery::self())
            ->getMock()->shouldReceive('fails')->once()->andReturn(true)
            ->getMock()->shouldReceive('messages')->once()->andReturn(new Illuminate\Support\Collection([1, 2, 3]));

        $this->call('POST', 'user/store');
        $this->assertHasOldInput();
        $this->assertSessionHas('message');
        $this->assertRedirectedTo('signup');
    }

    public function testUserStoreSuccessfully()
    {
        $input = [
            'username' => 'ChoA',
            'password' => 'password',
            'email'    => 'ChoA@crayon.pop'
        ];

        Validator::shouldReceive('make')->once()->andReturn(Mockery::mock(['fails'=>false]));

        Event::shouldReceive('fire')->once()->andReturn(true);

        Auth::shouldReceive('login')->once()->andReturn(true);

        $this->call('POST', 'user/store', $input);
        $this->assertRedirectedToRoute('home');
    }

    public function testProfileShow()
    {
        $this->action('GET', 'UserController@profileShow', ['username'=>$this->user->username]);
        $this->assertViewHas('user');
        $this->assertViewHas('title');
        $this->assertResponseOk();
    }

    public function testUserEdit()
    {
        $this->be($this->user);
        $this->call('GET', 'settings/password');
        $this->assertViewHas('title');
        $this->assertResponseOk();
    }

    public function testUserProfileEdit()
    {
        $this->be($this->user);
        $this->call('GET', 'settings/profile');
        $this->assertViewHas('user');
        $this->assertViewHas('title');
        $this->assertResponseOk();
    }

    public function testUserFollowing()
    {
        $this->action('GET', 'UserController@following', ['username'=>$this->user->username]);
        $this->assertResponseOk();
    }

    public function testUserFollowers()
    {
        $this->action('GET', 'UserController@followers', ['username'=>$this->user->username]);
        $this->assertResponseOk();
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
