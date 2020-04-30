<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

/**
 * ALl students route
 */
Route::get('students', 'StudentController@index'); //All students view

/**
 * All students action routes
 * Student can be add, update and delete with this route
 */
Route::group(['prefix' => 'student'], function () {
    Route::post('add', 'StudentController@add');
    Route::get('edit/{id}', 'StudentController@edit');
    Route::post('update/{id}', 'StudentController@update');
    Route::delete('delete/{id}', 'StudentController@delete');
});

/**
 * ALl teachers route
 */
Route::get('teachers', 'TeacherController@index'); //All Teacher view

/**
 * All teachers action routes
 * Teacher can be add, update and delete with this route
 */
Route::group(['prefix' => 'teacher'], function () {
    Route::post('add', 'TeacherController@add');
    Route::get('edit/{id}', 'TeacherController@edit');
    Route::post('update/{id}', 'TeacherController@update');
    Route::delete('delete/{id}', 'TeacherController@delete');
});
