<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','HomeController@getIndex');
Route::post('/','HomeController@postIndex');
Route::get('/login','AdminController@getLogin');
Route::post('/login','AdminController@postLogin');
Route::get('/admin','AdminController@getIndex');
Route::post('/admin','AdminController@postIndex');
Route::get('/logout','AdminController@getLogout');


