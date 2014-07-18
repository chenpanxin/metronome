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

HTML::macro('followers', function($user)
{
    return '<a href="'.url(join('/', ['~'.$user->username, 'followers'])).'">'.trans('locale.followers').' 0</a>';
});

HTML::macro('following', function($user)
{
    return '<a href="'.url(join('/', ['~'.$user->username, 'following'])).'">'.trans('locale.following').' 20</a>';
});

HTML::macro('activity', function($user)
{
    return '<a href="'.url(join('/', ['~'.$user->username, 'activity'])).'">'.trans('locale.activity').'</a>';
});

HTML::macro('topics', function($user)
{
    return '<a href="'.url(join('/', ['~'.$user->username, 'topics'])).'">'.trans('locale.topic').' 10</a>';
});

HTML::macro('user', function($user)
{
    return '<a href="'.url(join('', ['~', $user->username])).'">'.$user->username.'</a>';
});

HTML::macro('watching', function()
{
    return '<a href="'.url('me/watching').'">'.trans('locale.watching').' 20</a>';
});

HTML::macro('likes', function()
{
    return '<a href="'.url('me/likes').'">'.trans('locale.likes').' 20</a>';
});
