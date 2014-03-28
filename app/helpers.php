<?php

Form::macro('userText', function($name, $value = null, $options = [])
{
    $label = (array_key_exists('label', $options)) ? $options['label'] : null;
    return join('', [
        '<li class="field">',
        Form::label($name, $label),
        Form::text($name, $value, $options),
        '</li>'
    ]);
});

Form::macro('userPassword', function($name, $options = [])
{
    $label = (array_key_exists('label', $options)) ? $options['label'] : null;
    return join('', [
        '<li class="field">',
        Form::label($name, $label),
        Form::password($name, $options),
        '</li>'
    ]);
});
