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

/*Route::get('/', 'WelcomeController@index');*/

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesiÃ³n.
Route::post('login', 'AuthController@postLogin');
Route::get('empleados', 'EmpleadoController@index');

/**
 * Usuarios
 */


/**
 *  Routes Historial
 */
Route::get('historial-productos/{id}', ['as' => 'historial-productos', 'uses' => 'HistorialsController@index']);
Route::put('historial-delete/{id}', ['as' => 'historial-delete', 'uses' => 'HistorialsController@destroy']);
Route::get('descarga-productos/{id}', ['as' => 'descarga-productos', 'uses' => 'HistorialsController@descargasProducto']);
/**
 *  Routes Empleados
 */
Route::get('empleados/registrar-empleados', ['as' => 'registrar-empleados', 'uses' => 'EmpleadosController@create']);
Route::get('empleados', ['as' => 'ver-empleados', 'uses' => 'EmpleadosController@index']);
Route::post('empleados/guardar-empleados', ['as' => 'guardar-empleados', 'uses' => 'EmpleadosController@store']);
Route::get('empleados/editar-empleados/{id}', ['as' => 'editar-empleados', 'uses' => 'EmpleadosController@edit']);
Route::post('empleados/update-empleados/{id}', ['as' => 'update-empleados', 'uses' => 'EmpleadosController@update']);
/**
 * Routes Obsevaciones
 */
Route::get('observaciones/lista-observacion', ['as' => 'lista-observacion', 'uses' => 'ObservacionController@index']);
/**
 * Claro
 */

Route::get('claro', ['as' => 'claro', 'uses' => 'ClaroController@index']);
Route::get('claro/{name}', ['as' => 'producto_claro', 'uses' => 'ProductoController@getProduct']);
Route::get('claro/{name}/{date}', ['as' => 'data_product', 'uses' => 'ClaroController@dataProduct']);
Route::get('claro/importar-ciclo/{id}', ['as' => 'importar-ciclo', 'uses' => 'ClaroController@importarClaro']);
Route::post('claro/importar-ciclo', ['as' => 'save-ciclo', 'uses' => 'ClaroController@importarExcelClaro']);
Route::post('claro/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'EmpresasController@scanearCiclo']);
Route::get('claro/ciclo', 'EmpresasController@ListaDatosEmpresas');
