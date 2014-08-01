<?php

class AliasControllerTest extends TestCase {

    public function test_session_new()
    {
        $this->call('GET', 'session/new');
        $this->assertRedirectedTo('login');
    }
}
