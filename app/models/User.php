<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'users';

    protected $hidden = array('password');

    protected $fillable = ['email', 'username'];

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function topics()
    {
        return $this->hasMany('Topic');
    }

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function followers()
    {
        return $this->belongsToMany('User', 'relationships', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany('User', 'relationships', 'follower_id', 'followed_id');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }
}
