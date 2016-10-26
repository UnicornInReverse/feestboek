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


Route::get('/logout', ['middleware' => 'auth', 'uses' => 'Auth\LoginController@logout']);
Auth::routes();

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', ['as' => 'home',  'uses' => 'HomeController@index']);
    Route::get('home/search', ['as'=>'home.search', 'uses'=>'HomeController@search']);
//    Route::match(['get', 'post'], 'home/search', ['as' => 'home.search',  'uses' => 'HomeController@search']);
    Route::get('users/{user}', ['as' => 'home.users', 'uses' => 'HomeController@show']);
    
    Route::get('beer', ['as' => 'home.beer', 'uses' => 'UserBeerController@index']);
    Route::get('beer/add/{beer}', ['as' => 'beer.store', 'uses' => 'UserBeerController@store']);
    
    Route::get('places', ['as' => 'home.places', 'uses' => 'UserPlaceController@index']);
    Route::get('place/add/{place}', ['as' => 'place.store', 'uses' => 'UserPlaceController@store']);
    
    Route::get('friend/add/{user}', ['as' => 'friend.store', 'uses' => 'HomeController@store']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'UserController@index']);
    Route::get('users/edit/{user}', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit']);
    Route::patch('users/{user}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::get('user/admin-update/{user}', ['as' => 'admin.update', 'uses' => 'UserController@adminUpdate']);
    Route::delete('users/destroy/{user}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

    Route::get('beers', ['as' => 'admin.beers', 'uses' => 'BeerController@index']);
    Route::get('beers/destroy/{beer}', ['as' => 'admin.beers.delete', 'uses' => 'BeerController@destroy']);
    Route::post('beers', ['as' => 'admin.beers.store', 'uses' => 'BeerController@store']);

    Route::get('places', ['as' => 'admin.places', 'uses' => 'PlacesController@index']);
    Route::get('places/destroy/{place}', ['as' => 'admin.places.delete', 'uses' => 'PlacesController@destroy']);
    Route::post('places', ['as' => 'admin.places.store', 'uses' => 'PlacesController@store']);

});
