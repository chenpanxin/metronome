<?php namespace Ampou\Validators;

class UserValidator extends Validator {

    protected static $rules = [
        'username' => 'required|alpha_dash|unique:users|max:32',
        'email'    => 'required|email|unique:users',
        'password' => 'required|alpha_dash|between:6,16'
    ];
}
