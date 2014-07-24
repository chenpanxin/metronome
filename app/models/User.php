<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'users';

    protected $hidden = array('password');

    protected $fillable = ['email', 'username', 'downcase'];

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function notStaff()
    {
        return ! $this->staff;
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

    public function replies()
    {
        return $this->hasMany('Reply');
    }

    public function liking()
    {
        return $this->belongsToMany('Topic', 'likes');
    }

    public function events()
    {
        return $this->hasMany('Crayon\Models\Event');
    }
}
