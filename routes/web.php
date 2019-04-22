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
    //setting
    Route::get('/setting', 'SettingController@index')->name('client-setting');
    Route::get('/titles', 'SettingController@titles')->name('client-titles');
    Route::get('/messagesetting', 'SettingController@msetting')->name('client-message-setting');
    Route::post('/messagesetting/update', 'SettingController@update')->name('client-message-update');
    
    //arbitag controll
    Route::get('/arbitag', 'ChannelController@index')->name('currence-arbitag');
    Route::post('/arbitag/new', 'ChannelController@edit')->name('editarbitag');
    Route::post('/goldarb/new', 'ChannelController@savegold')->name('gold-arbitag-update');
    Route::get('/goldarbitag', 'ChannelController@gold')->name('gold-arbitag');
});
