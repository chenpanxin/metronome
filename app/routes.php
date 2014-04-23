<?php

Route::pattern('id', '[0-9]+');
Route::pattern('username', '[A-Z0-9a-z]+');
Route::pattern('reply', 'reply|r');
Route::pattern('not_found', '404(\.html)?');

Route::group(['prefix'=>'admin'], function()
{
    Route::get('/', 'Admin\HomeController@index');
    Route::get('login', 'Admin\SessionController@create');
    Route::get('users', 'Admin\UserController@index');
    Route::get('topics', 'Admin\TopicController@index');
    Route::get('categories', 'Admin\CategoryController@index');
});

Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@logout');
Route::post('sessions/store', 'SessionController@store');
Route::delete('logout', 'SessionController@destroy');

Route::get('signup', 'UserController@create');
Route::get('users', 'UserController@index');
Route::post('user/store', 'UserController@store');
Route::get('user/{username}', 'UserController@show');

Route::get('/', 'TopicController@index');
Route::get('topic/new', 'TopicController@create');
Route::get('topic/{id}', 'TopicController@show');
Route::get('topic/{id}/edit', 'TopicController@edit');
Route::post('topic/store', 'TopicController@store');
Route::put('topic/{id}', 'TopicController@update');
Route::delete('topic/{id}', 'TopicController@destroy');
Route::get('category/{id}', 'TopicController@category');

Route::get('settings', 'UserController@notify');
Route::get('settings/profile', 'UserController@profileEdit');
Route::put('settings/profile', 'UserController@profileUpdate');
Route::get('settings/password', 'UserController@edit');
Route::put('settings/password', 'UserController@update');
Route::get('u/{username}/replies', 'UserController@show');
Route::post('{reply}/store', 'ReplyController@store');

Route::get('{reply}/{id}', 'ReplyController@show');
Route::put('{reply}/{id}', 'ReplyController@update');

Route::get('{not_found}', function()
{
    return Response::json(['error'=>'page not found.']);
});

Route::group(['domain'=>'ghost.nhn.io'], function()
{

});

Event::listen('illuminate.query', function($query)
{

});
