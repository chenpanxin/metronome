<?php namespace Metronome\Repositories;

use Metronome\Models\Event;
use Auth;
use HTML;

class ActivityRepository {

    protected $event;
    protected $target;

    public function __construct(Event $event = null)
    {
        $this->event = $event ?: new Event;
    }

    public function touch($target)
    {
        $this->target = $target;

        return $this;
    }

    public function newTopicEvent()
    {
        $this->setContent(HTML::newTopicEvent($this->target));
    }

    public function replyEvent()
    {
        $this->setContent(HTML::replyEvent($this->target));
    }

    public function likeEvent()
    {

    }

    public function starEvent()
    {

    }

    public function followEvent()
    {

    }

    public function signupEvent()
    {

    }

    private function setContent($content)
    {
        $this->event->content = $content;
        Auth::user()->events()->save($this->event);
    }
}
