<?php

use Illuminate\Support\Facades\Route;

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

Route::get('storage/avatars/{archivo}', 'StorageController@getAvatar');
Route::get('storage/media/{archivo}', 'StorageController@getMedia');
Route::get('storage/fairs/{archivo}', 'StorageController@getFairs');

// Route::get('/{any}', 'web\AppController@index')->where('any', '.*');
