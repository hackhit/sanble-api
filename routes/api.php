<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('web')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
            Route::post('signup', 'web\AuthController@signup');
            Route::post('login', 'web\AuthController@login');
            Route::post('logout', 'web\AuthController@logout');
            Route::post('refresh', 'web\AuthController@refresh');
            Route::post('check', 'web\AuthController@checkToken');
        });

        Route::get('test', 'AppController@test');
    });
});
