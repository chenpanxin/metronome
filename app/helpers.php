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

HTML::macro('isActive', function($segment, $match)
{
    return $segment == $match ? 'active' : 'nil';
});

HTML::macro('tab', function($name, $url, $count)
{
    return '<li><a href="'.$url.'">'.$name.'</a><span>'.'</span></li>';
});

Str::macro('avatar_url', function($email = 'nhn@me.io')
{
    return join(md5(strtolower(trim($email))), ['http://www.gravatar.com/avatar/', '?s=56&d=mm&r=pg']);
});
