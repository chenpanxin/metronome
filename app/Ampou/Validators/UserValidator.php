<?php namespace Ampou\Validators;

class UserValidator extends Validator {

    protected static $rules = [
        'username' => ['required', 'regex:/\A[A-Za-z0-9]{1,}[-_]?[A-Za-z0-9]+?\z/', 'unique:users', 'min:2', 'max:32'],
        'email'    => 'required|email|unique:users',
        'password' => ['required', 'regex:/\A[0-9a-z-_\.]+\z/i', 'between:6,16']
    ];
}
