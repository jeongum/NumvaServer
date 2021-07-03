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

/* Auth */
Route::prefix('/auth')->group(function () {
    Route::post('register', 'API\AuthAPIController@register');
    Route::post('login', 'API\AuthAPIController@login');
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'API\AuthAPIController@logout');
        Route::get('user', 'API\AuthAPIController@getUser');
    });
    Route::post('validEmail', 'API\AuthAPIController@validEmail');
    Route::post('findEmail', 'API\AuthAPIController@findEmail'); 
    Route::post('resetPW', 'API\AuthAPIController@resetPW');
    Route::post('certPhone', 'API\AuthAPIController@certPhone');
});

Route::middleware('auth:api')->group(function(){
    /* Memo API */
    Route::prefix('/memo')->group(function(){
        Route::post('setCurrent','API\MemoAPIController@setCurrentMemo');
        Route::get('getCurrent','API\MemoAPIController@getCurrentMemo');
    });
    
    Route::prefix('/safetyInfo')->group(function(){
       Route::post('setQR', 'API\SafetyInfoAPIController@setSafetyInfo'); 
    });
});
