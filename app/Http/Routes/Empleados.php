<?php

/**
 *  Routes Empleados
 */

Route::controller('empleados', 'EmployeesController', [
    'anyData'  => 'empleados.list',
    'getIndex' => 'empleados',
]);
Route::get('empleados/create', ['as' => 'crear-empleados', 'uses' => 'EmployeesController@create']);
Route::post('empleados/save', 'EmployeesController@store');
Route::delete('empleados/delete/{id}', ['as' => 'delete-menu', 'uses' => 'EmployeesController@destroy']);
Route::patch('empleados/active/{id}', ['as' => 'active-menu', 'uses' => 'EmployeesController@active']);
Route::get('empleados/editar/{id}', ['as' => 'editar-empleados', 'uses' => 'EmployeesController@edit']);
Route::put('empleados/editar/{id}', 'EmployeesController@update');