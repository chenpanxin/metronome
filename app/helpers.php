<?php

HTML::macro('followers', function($user)
{
    return link_to(join('/', [$user->username, 'followers']), trans('locale.followers'));
});

HTML::macro('following', function($user)
{
    return link_to(join('/', [$user->username, 'following']), trans('locale.following'));
});

HTML::macro('activity', function($user)
{
    return link_to(join('?', [$user->username, 'tab=activity']), trans('locale.activity'));
});

HTML::macro('replies', function($user)
{
    return link_to(join('/', [$user->username, 'replies']), trans('locale.reply'));
});

HTML::macro('topics', function($user)
{
    return link_to(join('?', [$user->username, 'tab=topics']), trans('locale.topic'));
});

HTML::macro('authTopics', function($user)
{
    return link_to(join('/', [$user->username, 'topics']), trans('locale.me'));
});

HTML::macro('watching', function($user)
{
    return link_to(join('/', [$user->username, 'watching']), trans('locale.watching'));
});

HTML::macro('likes', function($user)
{
    return link_to(join('/', [$user->username, 'likes']), trans('locale.likes'));
});

HTML::macro('user', function($user)
{
    return link_to($user->username, $user->username);
});

HTML::macro('categories', function()
{
    return link_to('admin/categories', trans('locale.category'));
});

HTML::macro('tags', function()
{
    return link_to('admin/tags', trans('locale.tag'));
});

HTML::macro('users', function()
{
    return link_to('admin/users', trans('locale.users'));
});

HTML::macro('admin', function()
{
    return link_to('admin', trans('locale.topic'));
});

Str::macro('avatar_url', function($email = null)
{
    return join(md5(strtolower(trim($email ?: 'hello@gravatar.com'))), ['http://www.gravatar.com/avatar/', '?s=56&d=mm&r=pg']);
});
