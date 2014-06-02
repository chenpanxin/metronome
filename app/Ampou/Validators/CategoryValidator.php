<?php namespace Ampou\Validators;

class CategoryValidator extends Validator {

    protected static $rules = [
        'name' => 'required|min:4',
        'slug' => 'required|min:4'
    ];
}
