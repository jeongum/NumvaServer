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
    Route::post('validEmail', 'API\AuthAPIController@validEmail');
    Route::post('register', 'API\AuthAPIController@register');
    Route::post('login', 'API\AuthAPIController@login');
    Route::middleware('auth:api')->group(function() {
        Route::get('logout', 'API\AuthAPIController@logout');
        Route::get('user', 'API\AuthAPIController@getUser');
    });
});

/* Car */
Route::prefix('car')->group(function(){
    Route::post('/register', 'API\CarAPIController@register_car');
    Route::put('/update/{id}', 'API\CarAPIController@update_car');
    Route::delete('/delete/{id}', 'API\CarAPIController@delete_car');
});



/* Subscriber */
Route::prefix('subscriber')->group(function(){
    Route::post('/register', 'API\SubscriberAPIController@register');
    Route::post('/unsubscribe', 'API\SubscriberAPIController@unsubscribe');
});