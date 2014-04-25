<?php namespace Ampou\Validators;

class UserValidator extends Validator {

    protected static $rules = [
        'email' => 'required|email'
    ];
}
