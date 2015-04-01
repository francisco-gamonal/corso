<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/* Route::get('/', 'WelcomeController@index'); */

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesiÃ³n.
Route::post('login', 'AuthController@postLogin');
Route::get('empleados', 'StaffController@index');


/**
 * Usuarios
 */
/**
 *  Routes Historial
 */
Route::get('historial-productos/{id}', ['as' => 'historial-productos', 'uses' => 'RecordsController@index']);
Route::put('historial-delete/{id}', ['as' => 'historial-delete', 'uses' => 'RecordsController@destroy']);
Route::get('descarga-productos/{id}', ['as' => 'descarga-productos', 'uses' => 'RecordsController@descargasProducto']);
/**
 *  Routes Empleados
 */
Route::get('empleados/registrar-empleados', ['as' => 'registrar-empleados', 'uses' => 'StaffController@create']);
Route::get('empleados', ['as' => 'ver-empleados', 'uses' => 'StaffController@index']);
Route::post('empleados/guardar-empleados', ['as' => 'guardar-empleados', 'uses' => 'StaffController@store']);
Route::get('empleados/editar-empleados/{id}', ['as' => 'editar-empleados', 'uses' => 'StaffController@edit']);
Route::post('empleados/update-empleados/{id}', ['as' => 'update-empleados', 'uses' => 'StaffController@update']);
/**
 * Routes Obsevaciones
 */
Route::get('observaciones', ['as' => 'lista-observacion', 'uses' => 'ObservationsController@index']);
/**
 * Claro
 */
Route::get('claro', ['as' => 'claro', 'uses' => 'ClaroController@index']);
Route::get('claro/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('claro/{name}', ['as' => 'data_product', 'uses' => 'ClaroController@dataProduct']);
Route::get('claro/importar-ciclo/{id}', ['as' => 'importar-ciclo', 'uses' => 'ClaroController@importarClaro']);
/*Route::post('claro/importar-ciclo', ['as' => 'save-ciclo', 'uses' => 'ClaroController@importarExcelClaro']);
Route::post('claro/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);*/
Route::get('claro/ciclo', 'BusinessController@ListaDatosEmpresas');

/**
 * Routes usuarios
 */
Route::get('usuarios', ['as' => 'lista-users', 'uses' => 'UserController@index']);
Route::get('usuarios/registrar-usuario/{id}', ['as' => 'create-users', 'uses' => 'UserController@create']);
Route::get('usuarios/editar-usuario/{id}', ['as' => 'edit-users', 'uses' => 'UserController@edit']);
Route::get('usuarios/eliminar-usuario', ['as' => 'delete-users', 'uses' => 'UserController@destroy']);
/**
 * Test
 */
Route::get('test', 'TestController@index');
