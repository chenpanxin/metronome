<?php namespace Crayon\Models;

use DB;
use Auth;
use HTML;
use User;
use Log;
use DateTime;

class Activity {

    protected $user;
    protected $target;
    protected $events;

    public function __construct(User $user = null)
    {
        $this->user = $user ?: Auth::user();
        $this->events = DB::table('events');
    }

    public function touch($target)
    {
        $this->target = $target;
        return $this;
    }

    // public function like()
    // {
    //     $content = HTML::likeTheTopic(Topic $this->target);
    // }

    // public function follow()
    // {
    //     $content = HTML::followThatUser(User $this->target)
    // }

    // public function watch()
    // {
    //     $content = HTML::watchTheTopic(Topic $this->target);
    // }

    public function reply()
    {
        $this->setContent(HTML::replyTheTopic($this->target));
    }

    // public function create()
    // {
    //     $content = HTML::createOneTopic(Topic $this->target);
    // }

    // public function join()
    // {
    //     $content = HTML::joinToUs(User $this->target);
    // }

    // Activity::touch($target)->action_name();

    private function setContent($content)
    {
        $this->events->insert([
            'user_id'    => $this->user->id,
            'content'    => $content,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);
    }
}
