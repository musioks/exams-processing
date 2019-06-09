<?php
/**
 *Lecturer and Student Portal Routes
 */

Route::namespace('Lecturers')->prefix('portal/lecturer')->middleware('auth')->group(function () {
    Route::get('/units/', 'DefaultController@index')->middleware('role:LECTURER');
    //==============Lecturer Units=========
    Route::get('/exams', 'DefaultController@exams')->middleware('role:LECTURER');
});