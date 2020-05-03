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

Route::group(['prefix' => 'v1', 'namespace' => 'API'], function () {
    // public routes, user can access without any restriction
    Route::group(['prefix' => 'auth'], function () {
        // create user
        Route::post('register', 'AuthController@register');
        // login user
        Route::post('login', 'AuthController@login');
        // refresh JWT token
        Route::post('refresh', 'AuthController@refresh');
    });
    // routes for authentificated users
    Route::group(['prefix' => 'auth', 'middleware' => 'auth:api'], function () {
        // logout
        Route::post('logout', 'AuthController@logout');
        // get user info
        Route::get('user', 'AuthController@user');
    });
});
