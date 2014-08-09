<?php namespace Metronome\Validators;

class CategoryValidator extends Validator {

    protected static $rules = [
        'name' => 'required|min:2|unique:categories',
        'slug' => 'required|unique:categories'
    ];
}
