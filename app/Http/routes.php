<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::resource('city', 'CityController');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('categoryDetail', 'CategoryDetailController');
    Route::group(['middleware' => 'auth.token'], function () {
    });
});
