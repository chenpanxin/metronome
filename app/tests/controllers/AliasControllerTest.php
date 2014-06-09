<?php

class AliasControllerTest extends TestCase {

    public function testUser()
    {
        $this->call('GET', 'user');
        $this->assertRedirectedTo('users');
    }

    public function testUserNew()
    {
        $this->call('GET', 'user/new');
        $this->assertRedirectedTo('signup');
    }

    public function testSessionNew()
    {
        $this->call('GET', 'session/new');
        $this->assertRedirectedTo('login');
    }

    public function testIndexByTopics()
    {
        $this->call('GET', 'topics');
        $this->assertRedirectedTo('/');
    }

    public function testIndexByTopic()
    {
        $this->call('GET', 'topic');
        $this->assertRedirectedTo('/');
    }
}
