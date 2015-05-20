<?php

/**
 *  Routes Empleados
 */
Route::get('empleados/registrar-empleados', ['as' => 'registrar-empleados', 'uses' => 'StaffController@create']);
Route::get('empleados', ['as' => 'ver-empleados', 'uses' => 'StaffController@index']);
Route::post('empleados/guardar-empleados', ['as' => 'guardar-empleados', 'uses' => 'StaffController@store']);
Route::get('empleados/editar-empleados/{id}', ['as' => 'editar-empleados', 'uses' => 'StaffController@edit']);
Route::post('empleados/update-empleados/{id}', ['as' => 'update-empleados', 'uses' => 'StaffController@update']);