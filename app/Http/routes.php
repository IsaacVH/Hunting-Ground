<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web', 'auth']], function () {

	Route::group(['prefix' => 'api'], function () {

		Route::group(['prefix' => 'hunts'], function () {
			Route::delete('/{hunt}', 'Api\HuntApiController@delete');
			Route::get('/{hunt}', 'Api\HuntApiController@get');
			Route::get('/', 'Api\HuntApiController@gets');
			Route::put('/{hunt}', 'Api\HuntApiController@update');
			Route::post('/', 'Api\HuntApiController@create');
		});
	});

	Route::group(['prefix' => 'user'], function () {
		Route::get('/user/profile', 'User\UserController@showProfile');
	});

	Route::group(['prefix' => 'hunts'], function () {
		Route::get('/create', 'Hunt\HuntController@showCreate');
	});
});
