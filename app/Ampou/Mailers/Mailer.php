<?php namespace Ampou\Mailers;

use Mail;

abstract class Mailer {

    protected $from;
    protected $view;
    protected $subject;

    public function deliver()
    {
        Mail::send($this->view, $data = [], function($message)
        {
            $message->to('ruby@ampou.com')->subject('Welcome!');
        });
    }
}
