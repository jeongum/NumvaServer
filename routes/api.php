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


Route::post('/pass/getInfo','API\PassAPIController@getInfo');

/* Auth */
Route::prefix('/auth')->group(function () {
    Route::post('register', 'API\AuthAPIController@register');
    Route::post('socialRegister', 'API\AuthAPIController@socialRegister');
    Route::post('login', 'API\AuthAPIController@login');
    Route::post('socialLogin', 'API\AuthAPIController@socialLogin');
    Route::post('validSocial', 'API\AuthAPIController@validSocial');
    Route::post('linkSocial', 'API\AuthAPIController@linkSocial');
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'API\AuthAPIController@logout');
        Route::delete('delete','API\AuthAPIController@delete');
    });
    Route::get('checkToken', 'API\AuthAPIController@checkToken');
    Route::get('authException', 'API\AuthAPIController@authException')->name('authException');

});
Route::prefix('/user')->group(function () {
    Route::post('validEmail', 'API\UserAPIController@validEmail');
    Route::post('socialValidEmail', 'API\UserAPIController@socialValidEmail');
    Route::post('findEmail', 'API\UserAPIController@findEmail');
    Route::post('certForPW', 'API\UserAPIController@certForResetPW');
    Route::post('resetPW', 'API\UserAPIController@resetPW');
    Route::post('certPhone', 'API\UserAPIController@certPhone');
});

Route::prefix('/safetyInfo')->group(function(){
    Route::post('scanQR', 'API\SafetyInfoAPIController@scanQR');
});

Route::prefix('/faq')->group(function(){
    Route::get('getAll', 'API\FAQAPIController@getAllFAQ');
    Route::post('get', 'API\FAQAPIController@getFAQ');
});

Route::middleware('auth:api')->group(function(){
    
    Route::prefix('/user')->group(function() {
        Route::get('user', 'API\UserAPIController@getUser');
        Route::post('edit', 'API\UserAPIController@editUser');
    });

    /* Memo API */
    Route::prefix('/memo')->group(function(){
        Route::post('set','API\MemoAPIController@setMemo');
        Route::post('get','API\MemoAPIController@getMemo');
    });
    
    Route::prefix('/safetyInfo')->group(function(){
       Route::post('registerQR', 'API\SafetyInfoAPIController@registerQR');
       Route::get('getSI', 'API\SafetyInfoAPIController@getSI');
       Route::post('setName', 'API\SafetyInfoAPIController@setSIName');
       Route::post('deleteSI', 'API\SafetyInfoAPIController@deleteSI');
    });
    
    Route::prefix('/secondPhone')->group(function(){
        Route::post('set', 'API\SecondPhoneAPIController@setSecondPhone');
        Route::get('get', 'API\SecondPhoneAPIController@getSecondPhone');
        Route::post('delete', 'API\SecondPhoneAPIController@deleteSecondPhone');
        Route::post('setRep', 'API\SecondPhoneAPIController@setRep');
    });
    
    Route::prefix('/quickMemo')->group(function(){
       Route::get('get','API\QuickMemoAPIController@getQuickMemo'); 
       Route::post('set','API\QuickMemoAPIController@setQuickMemo'); 
       Route::post('delete','API\QuickMemoAPIController@deleteQuickMemo'); 
       Route::post('update','API\QuickMemoAPIController@updateQuickMemo'); 
    });
});
