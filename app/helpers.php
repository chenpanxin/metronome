<?php

HTML::macro('label', function($array = [])
{
    return '<label>'.join(' ', $array).'</label>';
});

HTML::macro('group', function($array = [])
{
    return '<li class="field">'.join('', $array).'</li>';
});

HTML::macro('tag', function()
{

});

HTML::macro('isActive', function($segment, $id)
{
    return $segment == $id ? 'active' : 'nil';
});

HTML::macro('tab', function($name, $url, $count)
{
    return '<li><a href="'.$url.'">'.$name.'</a><span>'.'</span></li>';
});
