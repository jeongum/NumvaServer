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
        Route::get('user', 'API\AuthAPIController@getUser');
        Route::post('changeNick', 'API\AuthAPIController@changeNick');
    });
    Route::get('checkToken', 'API\AuthAPIController@checkToken');
    Route::get('authException', 'API\AuthAPIController@authException')->name('authException');
});

Route::prefix('/user')->group(function () {
    Route::middleware('auth:api')->group(function() {
        Route::get('user', 'API\UserAPIController@getUser');
        Route::post('edit', 'API\UserAPIController@editUser');
        Route::post('changeNick', 'API\UserAPIController@changeNick');
    });
    Route::post('validEmail', 'API\UserAPIController@validEmail');
    Route::post('findEmail', 'API\UserAPIController@findEmail');
    Route::post('certForPW', 'API\UserAPIController@certForResetPW');
    Route::post('resetPW', 'API\UserAPIController@resetPW');
    Route::post('certPhone', 'API\UserAPIController@certPhone');
});


Route::middleware('auth:api')->group(function(){
    /* Memo API */
    Route::prefix('/memo')->group(function(){
        Route::post('set','API\MemoAPIController@setMemo');
        Route::post('get','API\MemoAPIController@getMemo');
    });
    
    Route::prefix('/safetyInfo')->group(function(){
       Route::post('registerQR', 'API\SafetyInfoAPIController@registerQR');
       Route::post('scanQR', 'API\SafetyInfoAPIController@scanQR');
       Route::get('getSI', 'API\SafetyInfoAPIController@getSI');
       Route::post('setName', 'API\SafetyInfoAPIController@setSIName');
    });
    
    Route::prefix('/secondPhone')->group(function(){
        Route::post('set', 'API\SecondPhoneAPIController@setSecondPhone');
        Route::get('get', 'API\SecondPhoneAPIController@getSecondPhone');
        Route::post('delete', 'API\SecondPhoneAPIController@deleteSecondPhone');
        Route::post('setRep', 'API\SecondPhoneAPIController@setRep');
    });
});
