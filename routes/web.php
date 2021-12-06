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

Route::get('/help/{category}', 'HelpController@faq')->name('help');
Route::post('/sendMail', 'HelpController@sendMail')->name('sendMail');

Route::get('/privacy', function () {
    return view('privacy');
});

/* Route for QR scan */
Route::get('/qr/service', 'QRController@service')->name('qr.service');
Route::get('/qr/{slug}', function ($slug) {
    return redirect()->route('qr.service')->with('qr_id',$slug);
});    

/* Admin Page */
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/qr/generate', 'AdminController@generateQRCode');
    Route::post('/qr/connectQR', 'AdminController@connectQR')->name('admin.connectQR');
    Route::post('/qr/unconnectQR', 'AdminController@unconnectQR')->name('admin.unconnectQR');
    Route::get('/user', 'AdminController@userIndex')->name('admin.user');
    Route::post('/user/delete', 'AdminController@userDelete')->name('admin.deleteUser');
    Route::get('/secondphone/delete/{id}', 'AdminController@secondphoneDelete')->name('admin.deleteSP');
    Route::get('/safetyInfo', 'AdminController@safetyInfoIndex')->name('admin.safetyInfo');
});

