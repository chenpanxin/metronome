<?php

class TopicControllerTest extends TestCase {

    public function testTopicNew()
    {

    }

    public function testTopicStore(){
        $this->be(User::first());
        // $this->call('POST', 'topic/store');
        // $this->assertRedirectedTo('/');
    }

    public function testTopiShow()
    {
        $topic = Topic::first();
        $this->action('GET', 'TopicController@show', ['id'=>$topic->id]);
        $this->assertResponseOk();
    }
}
