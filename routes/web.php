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
Route::get('profile','UserController@profile')->middleware('auth');
Route::get('logout','UserController@logout');
Route::get('loginid','UserController@loginId');