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

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/', function (){

        return view('admin.index');

    });

    Route::resource('/users', 'AdminUsersController');

    Route::resource('/posts', 'AdminPostsController');

    Route::resource('/categories', 'AdminCategoriesController');


});