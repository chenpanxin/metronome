<?php namespace Crayon\Utils;

class At {

    protected $content;
    protected $users;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getUsers()
    {
        return preg_match_all('/@(\w{3,20})/i', $this->content, $this->users)
            ? array_unique($this->users[1])
            : null;
    }

    public function getContent()
    {
        return preg_replace('/@(\w{3,20})\s/i', '<a href="/user/$1">@$1</a> ', $this->content);
    }
}
