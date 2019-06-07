<?php

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

Route::get('/', 'IndexController@login')->name('login');
Route::post('/', 'IndexController@signin');
//Route::post('/register','HomeController@storeUser');
Route::post('/signout', 'IndexController@getLogout')->name('signout');

/** ===========================Password Reset Routes=============================*/
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
/** ===========================End Password Reset Routes=============================*/

/** ===========================Dashboard Routes=============================*/
Route::namespace('Main')->prefix('main')->middleware('auth')->group(function () {
    Route::get('/profile', 'SettingsController@profile');
    Route::post('/profile', 'SettingsController@updateProfile');
    Route::get('/password', 'SettingsController@getPassword');
    Route::post('/password', 'SettingsController@changePassword');
    Route::get('/', 'IndexController@index');

    });
