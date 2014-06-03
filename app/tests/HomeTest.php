<?php

class HomeTest extends TestCase {

    public function testRoute()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());

        // $this->assertCount(1, $crawler->filter('#logo:contains("Hello World!")'));
        $this->assertResponseOk();
        $this->assertResponseStatus(403);
    }
}
