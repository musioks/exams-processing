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
    Route::get('/courses', 'CourseController@index')->middleware('role:ADMIN');
    Route::post('/courses', 'CourseController@store')->middleware('role:ADMIN');
    Route::patch('/courses/update/{course}', 'CourseController@update')->middleware('role:ADMIN');
    Route::get('/courses/delete/{course}', 'CourseController@destroy')->middleware('role:ADMIN');
    //==============Course Units=========
    Route::get('/courses/{course}/units', 'CourseController@units')->middleware('role:ADMIN');
    Route::post('/courses/{course}/units', 'CourseController@assignUnit')->middleware('role:ADMIN');
    Route::get('/courses/{course}/units/detach/{unit_id}', 'CourseController@detachUnit')->middleware('role:ADMIN');
});

// ========== Manage Units =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/units', 'UnitController@index')->middleware('role:ADMIN');
    Route::post('/units', 'UnitController@store')->middleware('role:ADMIN');
    Route::patch('/units/update/{unit}', 'UnitController@update')->middleware('role:ADMIN');
    Route::get('/units/delete/{unit}', 'UnitController@destroy')->middleware('role:ADMIN');
    ////========== Exams management================
    Route::get('/units/{unit}/exams', 'ExamsController@index')->middleware('role:ADMIN');
    Route::post('/units/{unit}/exams', 'ExamsController@store')->middleware('role:ADMIN');
    Route::get('/units/{unit}/exams/delete/{exam}', 'ExamsController@destroy')->middleware('role:ADMIN');
});

// ========== Manage Batches =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/batches', 'BatchController@index')->middleware('role:ADMIN');
    Route::post('/batches', 'BatchController@store')->middleware('role:ADMIN');
    Route::patch('/batches/update/{batch}', 'BatchController@update')->middleware('role:ADMIN');
    Route::get('/batches/delete/{batch}', 'BatchController@destroy')->middleware('role:ADMIN');
    //==============Batch Units=========
    Route::get('/batches/{batch}/units', 'BatchController@units')->middleware('role:ADMIN');
    Route::post('/batches/{batch}/units', 'BatchController@assignUnit')->middleware('role:ADMIN');
    Route::get('/batches/{batch}/units/detach/{unit_id}', 'BatchController@detachUnit')->middleware('role:ADMIN');
});

// ========== Manage Intakes =================
Route::namespace('Academics')->prefix('academics')->middleware('auth')->group(function () {
    Route::get('/intakes', 'IntakeController@index')->middleware('role:ADMIN');
    Route::post('/intakes', 'IntakeController@store')->middleware('role:ADMIN');
    Route::patch('/intakes/update/{intake}', 'IntakeController@update')->middleware('role:ADMIN');
    Route::get('/intakes/delete/{intake}', 'IntakeController@destroy')->middleware('role:ADMIN');
    //==============Intake Batches=========
    Route::get('/intakes/{intake}/batches', 'IntakeController@batches')->middleware('role:ADMIN');
    Route::post('/intakes/{intake}/batches', 'IntakeController@assignBatch')->middleware('role:ADMIN');
    Route::get('/intakes/{intake}/batches/detach/{batch_id}', 'IntakeController@detachBatch')->middleware('role:ADMIN');
});