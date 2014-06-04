<?php

class UserControllerTest extends TestCase {

    public function testSignup()
    {
        $this->call('GET', 'signup');
        $this->assertResponseOk();
    }

    public function testUserStore()
    {
        // $this->call('POST', 'user/store');
        // $this->assertRedirectedTo('signup');
    }

    public function testUserShow()
    {
        $username = User::first()->username;
        $this->action('GET', 'UserController@show', ['username'=>$username]);
        $this->assertResponseOk();
    }

    public function testUsersList()
    {
        $this->call('GET', 'users');
        $this->assertResponseOk();
    }
}
