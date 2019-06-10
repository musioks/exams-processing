<?php
/**
 *Lecturer and Student Portal Routes
 */

/// ====== Lecturer============
Route::namespace('Lecturers')->prefix('portal/lecturer')->middleware('auth')->group(function () {
    Route::get('/units/', 'DefaultController@index')->middleware('role:LECTURER');
    //==============Lecturer Units=========
    Route::get('/exams', 'DefaultController@exams')->middleware('role:LECTURER');
    Route::get('/exams/{id}', 'DefaultController@view_exams')->middleware('role:LECTURER');
    Route::post('/exams/{id}', 'DefaultController@submitMarks')->middleware('role:LECTURER');
    Route::get('/exams/{id}/results', 'DefaultController@results')->middleware('role:LECTURER');
});

/// ====== Student============
Route::namespace('Students')->prefix('portal/student')->middleware('auth')->group(function () {
    Route::get('/units/', 'DefaultController@index')->middleware('role:STUDENT');
    Route::post('/units/', 'DefaultController@register_units')->middleware('role:STUDENT');
    //==============Lecturer Units=========
    Route::get('/exams', 'DefaultController@exams')->middleware('role:STUDENT');

});