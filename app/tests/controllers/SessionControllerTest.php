<?php

class SessionControllerTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
    }

    public function testSessionCreate()
    {
        // $this->call('GET', 'login');
        // $this->assertResponseOk();
    }

    public function testSessionStoreAuthFails()
    {
        // $this->call('POST', 'session/store');
        // $this->assertRedirectedTo('login');
    }

    public function testSessionDestroy()
    {
        // $this->call('DELETE', 'logout');
        // $this->assertRedirectedTo('/');
    }
}
