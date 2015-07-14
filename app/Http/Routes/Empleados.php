<?php

/**
 *  Routes Empleados
 */
Route::get('empleados', ['as' => 'ver-empleados', 'uses' => 'StaffController@index']);
Route::get('empleados/crear', ['as' => 'crear-empleados', 'uses' => 'StaffController@create']);
Route::post('empleados/save', 'StaffController@store');
Route::delete('empleados/delete/{id}', ['as' => 'delete-menu', 'uses' => 'StaffController@destroy']);
Route::patch('empleados/active/{id}', ['as' => 'active-menu', 'uses' => 'StaffController@active']);
Route::get('empleados/editar/{id}', ['as' => 'editar-empleados', 'uses' => 'StaffController@edit']);
Route::put('empleados/editar/{id}', 'StaffController@update');