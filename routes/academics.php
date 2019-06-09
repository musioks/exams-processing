<?php
/*
|--------------------------------------------------------------------------
| Academics Routes
|--------------------------------------------------------------------------
|
| Here is where you can register academics routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ========== Manage Courses =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/courses', 'CourseController@index');
    Route::post('/courses', 'CourseController@store');
    Route::patch('/courses/update/{course}', 'CourseController@update');
    Route::get('/courses/delete/{course}', 'CourseController@destroy');
    //==============Course Units=========
    Route::get('/courses/{course}/units', 'CourseController@units');
    Route::post('/courses/{course}/units', 'CourseController@assignUnit');
    Route::get('/courses/{course}/units/detach/{unit_id}', 'CourseController@detachUnit');
});

// ========== Manage Units =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/units', 'UnitController@index');
    Route::post('/units', 'UnitController@store');
    Route::patch('/units/update/{unit}', 'UnitController@update');
    Route::get('/units/delete/{unit}', 'UnitController@destroy');
});

// ========== Manage Batches =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/batches', 'BatchController@index');
    Route::post('/batches', 'BatchController@store');
    Route::patch('/batches/update/{batch}', 'BatchController@update');
    Route::get('/batches/delete/{batch}', 'BatchController@destroy');
    //==============Batch Units=========
    Route::get('/batches/{batch}/units', 'BatchController@units');
    Route::post('/batches/{batch}/units', 'BatchController@assignUnit');
    Route::get('/batches/{batch}/units/detach/{unit_id}', 'BatchController@detachUnit');
});

// ========== Manage Intakes =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/intakes', 'IntakeController@index');
    Route::post('/intakes', 'IntakeController@store');
    Route::patch('/intakes/update/{intake}', 'IntakeController@update');
    Route::get('/intakes/delete/{intake}', 'IntakeController@destroy');
    //==============Intake Batches=========
    Route::get('/intakes/{intake}/batches', 'IntakeController@batches');
    Route::post('/intakes/{intake}/batches', 'IntakeController@assignBatch');
    Route::get('/intakes/{intake}/batches/detach/{batch_id}', 'IntakeController@detachBatch');
});