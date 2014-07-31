<?php

class TopicControllerTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testTopicStoreValidatorFails()
    {
        // $this->call('POST', 'topic/store');
        // $this->assertRedirectedTo('topic/new');
    }

    public function testTopicStoreSuccessfully()
    {
        // $mock = Mockery::mock('Ampou\Validators\TopicValidator');
        // $mock->shouldReceive('fails')->andReturn(false);

        // $this->call('POST', 'topic/store');
        // $this->assertRedirectedTo('topic/new');
    }
}
