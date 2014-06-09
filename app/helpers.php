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
    return $segment == $match;
});

HTML::macro('tab', function($name, $url, $count)
{
    return '<li><a href="'.$url.'">'.$name.'</a><span>'.'</span></li>';
});

HTML::macro('deleteTag', function($value, $url)
{
    return join('', ['<a href="'.$url.'" class="delete push">'.$value.'</a>', Form::open(['url'=>$url, 'method'=>'delete', 'style'=>'display:none']), Form::close()]);
});

Str::macro('avatar_url', function($email = 'nhn@me.io')
{
    return join(md5(strtolower(trim($email))), ['http://www.gravatar.com/avatar/', '?s=56&d=mm&r=pg']);
});

HTML::macro('easyTab', function($name, $url, $actived = false)
{
    $actived = ($actived == $name) ? ' class="active"' : '';
    $url = $url ?: URL::to('admin/'.$name);
    return '<li'.$actived.'><a href="'.$url.'">'.Lang::get('locale.'.$name).'</a></li>';
});
