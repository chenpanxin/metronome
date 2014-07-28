<?php namespace Metronome\Mailers;

use User;

class UserMailer extends Mailer {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function welcome()
    {
        $this->view = 'email.welcome';
        $this->subject = 'Welcome!';
        return $this;
    }
}
