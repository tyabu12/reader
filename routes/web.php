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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('entries', 'EntryController', [
    'only' => ['index', 'show'],
]);

Route::resource('feeds', 'FeedController', [
    'only' => ['index', 'show'],
]);

Route::post('feed/subscribe', 'FeedController@subscribe')
    ->name('feed.subscribe');

Route::post('feed/unsubscribe', 'FeedController@unsubscribe')
    ->name('feed.unsubscribe');

