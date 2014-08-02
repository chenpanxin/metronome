<?php

class AliasControllerTest extends TestCase {

    public function testSessionNew()
    {
        $this->call('GET', 'session/new');
        $this->assertRedirectedTo('login');
    }
}
