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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', 'TestController@index')->name('test');
Route::get('/webhook', 'TelegramController@webhook');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/arbitag', 'ChannelController@index')->name('currence-arbitag');
    Route::post('/arbitag/new', 'ChannelController@edit')->name('editarbitag');
});
