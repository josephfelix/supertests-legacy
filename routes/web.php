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

Route::get('/', 'IndexController@home');
Route::get('/l', 'IndexController@load');
Route::get('/l/{limit}', 'IndexController@load');
Route::get('/t/{guid}', 'TesteController@show');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/t/{guid}/r/{hash}', 'TesteController@result');

Route::group(['middleware' => ['login']], function () {
    Route::get('/t/{guid}/l', 'TesteController@loading');
    Route::post('/t/{guid}/m', 'TesteController@make');
});

