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
            Route::post('signup', 'AuthController@signup');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('check', 'AuthController@checkToken');
        });

        Route::group(['middleware' => 'api'], function ($router) {
            Route::post('fairs', 'FairsController@index');
        });
    });
});
