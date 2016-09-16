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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/admin', function (){

    return view('admin.index');

});


Route::resource('admin/users', 'AdminUsersController', ['names' => [

    'index'=>'admin.users.index',
    'create'=>'admin.users.create',
    'edit'=>'admin.users.edit'


]]);