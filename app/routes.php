<?php

Route::pattern('id', '[0-9]+');
Route::pattern('username', '[A-Z0-9a-z-_]+');
Route::pattern('reply', 'reply|r');
Route::pattern('not_found', '404(\.html)?');

Route::group(['prefix'=>'ghost'], function()
{
    Route::get('/', 'Admin\HomeController@index');
    Route::get('users', 'Admin\UserController@index');
    Route::get('topics', 'Admin\TopicController@index');
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('category/new', 'Admin\CategoryController@create');
    Route::post('category/store', 'Admin\CategoryController@store');
    Route::get('category/{id}/edit', 'Admin\CategoryController@edit');
    Route::put('category/{id}', 'Admin\CategoryController@update');
    Route::delete('category/{id}', 'Admin\CategoryController@destroy');
});

Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@logout');
Route::post('session/store', 'SessionController@store');
Route::delete('logout', 'SessionController@destroy');

Route::get('signup', 'UserController@create');
Route::get('users', 'UserController@index');
Route::post('user/store', 'UserController@store');
Route::get('user/{username}', 'UserController@show');
Route::get('user/{username}/topics', 'UserController@topics');
Route::get('user/{username}/following', 'UserController@following');
Route::get('user/{username}/followers', 'UserController@followers');
Route::get('user/verify/{token}', 'UserController@verify');

Route::get('/', 'TopicController@index');
Route::get('topic/new', 'TopicController@create');
Route::get('topic/{id}', 'TopicController@show');
Route::get('topic/{id}/edit', 'TopicController@edit');
Route::post('topic/store', 'TopicController@store');
Route::put('topic/{id}', 'TopicController@update');
Route::delete('topic/{id}', 'TopicController@destroy');
Route::get('category/{id}', 'TopicController@byCategory');
Route::get('newest', 'TopicController@newest');
Route::get('popular', 'TopicController@popular');
Route::get('no_discuss', 'TopicController@byComment');

Route::post('topic/{id}', 'CommentController@store');
Route::put('comment/{id}', 'CommentController@update');
Route::delete('topic/{id}/comment/{comment_id}', 'CommentController@destroy');
Route::get('topic/{id}/comment/{comment_id}', 'CommentController@edit');

Route::get('settings', 'UserController@notify');
Route::get('settings/profile', 'UserController@profileEdit');
Route::put('settings/profile', 'UserController@profileUpdate');
Route::post('settings/avatar', 'UserController@avatarStore');
Route::get('settings/password', 'UserController@edit');
Route::put('settings/password', 'UserController@update');
Route::get('u/{username}/replies', 'UserController@show');
Route::post('{reply}/store', 'ReplyController@store');

Route::get('session/forgot_password', 'ReminderController@getRemind');
Route::post('password/remind', 'ReminderController@postRemind');
Route::get('password/reset/{token}', 'ReminderController@getReset');
Route::post('password/reset', 'ReminderController@postReset');

Route::get('{reply}/{id}', 'ReplyController@show');
Route::put('{reply}/{id}', 'ReplyController@update');

Route::get('relationship', 'RelationshipController@show');
Route::post('follow', 'RelationshipController@store');
Route::post('unfollow', 'RelationshipController@destroy');

Route::post('topic/{id}/like', 'LikeController@store');
Route::post('topic/{id}/unlike', 'LikeController@destroy');

Route::get('colour', function()
{
    return View::make('pages.colour');
});

Route::get('{not_found}', function()
{
    return Response::json(['error'=>'page not found.']);
});

Route::group(['domain'=>'ghost.nhn.io'], function()
{

});

Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});

// Route::pattern('hash', '[a-z0-9]{32}');
// Route::pattern('slug', '[a-z0-9-]+');
// Route::when('*', 'csrf', array('post', 'put', 'delete'));
