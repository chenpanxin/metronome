<?php

Str::macro('avatar_url', function($email = 'nhn@me.io')
{
    return join(md5(strtolower(trim($email))), ['http://www.gravatar.com/avatar/', '?s=56&d=mm&r=pg']);
});

HTML::macro('easyTab', function($name, $url, $actived = false, $lang = false)
{
    $actived = ($actived == $name) ? ' class="active"' : '';
    $lang = $lang ?: Lang::get('locale.'.$name);
    $url = $url ?: URL::to('admin/'.$name);
    return '<li'.$actived.'><a href="'.$url.'">'.$lang.'</a></li>';
});

HTML::macro('easyActived', function($match, $segment)
{
    return ($match == $segment) ? '<li class="active">' : '<li>';
});
