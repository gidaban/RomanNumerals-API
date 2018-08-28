<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/','IndexController@index')->name('api.index');
Route::get('/top','IndexController@showTopConverted')->name('api.top');
Route::post('/','IndexController@store')->name('api.store');
