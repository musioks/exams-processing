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
    Route::get('/profile', 'SettingsController@profile')->middleware('role:USER');
    Route::post('/profile', 'SettingsController@updateProfile')->middleware('role:USER');
    Route::get('/password', 'SettingsController@getPassword')->middleware('role:USER');
    Route::post('/password', 'SettingsController@changePassword')->middleware('role:USER');
    Route::get('/', 'IndexController@index');
});

// ==========  Lecturers =================
Route::namespace('Lecturers')->prefix('lecturers')->middleware('auth')->group(function () {
    Route::get('/', 'IndexController@index')->middleware('role:ADMIN');
    Route::post('/', 'IndexController@store')->middleware('role:ADMIN');
    Route::patch('/update/{lecturer}', 'IndexController@update')->middleware('role:ADMIN');
    Route::get('/delete/{lecturer}', 'IndexController@destroy')->middleware('role:ADMIN');
    //==============Lecturer Units=========
    Route::get('/{lecturer}/units', 'IndexController@units')->middleware('role:ADMIN');
    Route::post('/{lecturer}/units', 'IndexController@assignUnit')->middleware('role:ADMIN');
    Route::get('/{lecturer}/units/detach/{unit_id}', 'IndexController@detachUnit')->middleware('role:ADMIN');
});

// ========== students =================
Route::namespace('Students')->prefix('students')->middleware('auth')->group(function () {
    Route::get('/', 'IndexController@index')->middleware('role:ADMIN');
    Route::post('/', 'IndexController@store')->middleware('role:ADMIN');
    Route::patch('/update/{student}', 'IndexController@update')->middleware('role:ADMIN');
    Route::get('/delete/{student}', 'IndexController@destroy')->middleware('role:ADMIN');

    //==============Student Units=========
    Route::get('/{student}/units', 'IndexController@units')->middleware('role:ADMIN');
    Route::post('/{student}/units', 'IndexController@assignUnit')->middleware('role:ADMIN');
    Route::get('/{student}/units/detach/{unit_id}', 'IndexController@detachUnit')->middleware('role:ADMIN');
});

