<?php

/**
 * Routes usuarios
 */
Route::get('usuarios', ['as' => 'lista-users', 'uses' => 'UserController@index']);
Route::get('usuarios/registrar-usuario/{id}', ['as' => 'create-users', 'uses' => 'UserController@create']);
Route::get('usuarios/editar-usuario/{id}', ['as' => 'edit-users', 'uses' => 'UserController@edit']);
Route::get('usuarios/eliminar-usuario', ['as' => 'delete-users', 'uses' => 'UserController@destroy']);