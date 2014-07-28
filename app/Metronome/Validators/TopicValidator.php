<?php namespace Metronome\Validators;

class TopicValidator extends Validator {

    protected static $rules = [

        'category_id' => 'required|exists:categories,id',
        'title'       => 'required|min:4',
        'body'        => 'required|min:4'

    ];
}
