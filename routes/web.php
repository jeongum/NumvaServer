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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/howtouse', function () {
    return view('howtouse');
});

/* Route for QR scan */
Route::get('/qr/generate', 'QRController@generateQRCode');
Route::get('/qr/service', 'QRController@index')->name('qr.service');
Route::get('/qr/{slug}', function ($slug) {
    return redirect()->route('qr.service')->with('qr_id',$slug);
});    

/* Admin Page */
Route::prefix('admin')->group(function(){
    Route::get('generate-qr', 'QRController@generateQRCode');
});

