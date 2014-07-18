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
    return '<a href="'.url(join('/', [$user->username, 'followers'])).'">'.trans('locale.followers').' 0</a>';
});

HTML::macro('following', function($user)
{
    return '<a href="'.url(join('/', [$user->username, 'following'])).'">'.trans('locale.following').' 20</a>';
});

HTML::macro('activity', function($user)
{
    return '<a href="'.url($user->username.'?tab=activity').'">'.trans('locale.activity').'</a>';
});

HTML::macro('topics', function($user)
{
    return '<a href="'.url($user->username.'?tab=topics').'">'.trans('locale.topic').' 10</a>';
});

HTML::macro('user', function($user)
{
    return '<a href="'.url($user->username).'">'.$user->username.'</a>';
});

HTML::macro('replies', function($user)
{
    return '<a href="'.url($user->username).'/replies'.'">'.trans('locale.reply').'</a>';
});

HTML::macro('authTopics', function($user)
{
    return '<a href="'.url($user->username).'/topics'.'">'.trans('locale.me').'</a>';
});

HTML::macro('watching', function($user)
{
    return '<a href="'.url($user->username.'/watching').'">'.trans('locale.watching').' 20</a>';
});

HTML::macro('likes', function($user)
{
    return '<a href="'.url($user->username.'/likes').'">'.trans('locale.likes').' 20</a>';
});
