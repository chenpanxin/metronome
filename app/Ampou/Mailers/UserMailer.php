<?php namespace Ampou\Mailers;

use User;

class UserMailer extends Mailer {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function welcome()
    {
        $this->view = 'emails.welcome';
        $this->subject = 'Welcome!';
        return $this;
    }
}
