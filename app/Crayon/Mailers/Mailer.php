<?php namespace Crayon\Mailers;

use Mail;

abstract class Mailer {

    protected $from;
    protected $view;
    protected $subject;

    public function deliver()
    {
        Mail::queue($this->view, $data = [], function($message)
        {
            $message->from('hello@nhn.me', 'menglr');
            $message->to('menglr@live.com');
            $message->subject('Welcome!');
        });
    }
}
