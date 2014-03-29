<?php

HTML::macro('label', function($array = [])
{
    return '<label>'.join(' ', $array).'</label>';
});

HTML::macro('group', function($array = [])
{
    return '<li class="field">'.join('', $array).'</li>';
});
