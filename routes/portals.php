<?php
/**
 *Lecturer and Student Portal Routes
 */

/// ====== Lecturer============
Route::namespace('Lecturers')->prefix('portal/lecturer')->middleware('auth')->group(function () {
    Route::get('/units/', 'DefaultController@index')->middleware('role:LECTURER');
    //==============Lecturer Units=========
    Route::get('/exams', 'DefaultController@exams')->middleware('role:LECTURER');
});

/// ====== Student============
Route::namespace('Students')->prefix('portal/student')->middleware('auth')->group(function () {
    Route::get('/units/', 'DefaultController@index')->middleware('role:STUDENT');
    //==============Lecturer Units=========
    Route::get('/exams', 'DefaultController@exams')->middleware('role:STUDENT');
});