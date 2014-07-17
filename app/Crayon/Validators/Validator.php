<?php namespace Crayon\Validators;

use Input;

abstract class Validator {

    protected $attributes;
    protected $validator;

    public function __construct($attributes = null)
    {
        $this->attributes = $attributes ?: Input::all();
        $this->validator = \Validator::make($this->attributes, static::$rules);
    }

    public function passes()
    {
        return $this->validator->passes();
    }

    public function fails()
    {
        return $this->validator->fails();
    }

    public function failed()
    {
        return $this->validator->failed();
    }

    public function messages()
    {
        return $this->validator->messages();
    }

    public function errors()
    {
        return $this->validator;
    }
}
