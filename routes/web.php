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

Route::group(['middleware'=>['web']], function() {

    Route::get('/logout', ['middleware' => 'auth', 'uses' => 'Auth\LoginController@logout']);
    Auth::routes();

    Route::get('/', function () {
        return view('pages.index');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', 'HomeController@index');

    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', ['as' => 'admin.index', 'uses' => 'UserController@index']);
        Route::get('users/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit']);
        Route::patch('users/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
        Route::get('user/admin-update/{id}', ['as' => 'admin.update', 'uses' => 'UserController@adminUpdate']);
        Route::delete('users/delete/{id}', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
    });

});

