<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/', function (){

        return view('admin.index');

    });

    Route::resource('/users', 'AdminUsersController');

    Route::resource('/posts', 'AdminPostsController');

    Route::resource('/categories', 'AdminCategoriesController');

    Route::resource('/media', 'AdminMediaController');

    Route::resource('/comments', 'PostCommentsController');

    Route::resource('/comment/replies', 'CommentRepliesController');

});

Route::group(['middleware' => 'auth'], function (){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});