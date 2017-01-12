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

Route::get('/', function () {
    return view('welcome');
});

Route::get('reg','UserController@reg');
Route::post('createUser','UserController@createUser');
Route::get('login','UserController@login');
Route::post('login','UserController@doLogin');
Route::get('profile/{user_id}','UserController@profile')->middleware('auth')->name('profile');
Route::get('logout','UserController@logout');
Route::get('loginid','UserController@loginId');
Route::post('profile/{user_id}','UserController@updateProfile')->middleware('auth');
Route::get('loginid/{user_id}','UserController@loginId');
Route::post('upprofilephoto/{user_id}','UserController@upProfilePhoto');