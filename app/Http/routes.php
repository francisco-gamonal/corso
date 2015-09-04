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
/*
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);*/

// Authentication routes.
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);



Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);

require (__DIR__ . '/Routes/Claro.php');
require (__DIR__ . '/Routes/Columbus.php');
require (__DIR__ . '/Routes/Atlantida.php');
require (__DIR__ . '/Routes/Empleados.php');
require (__DIR__ . '/Routes/Usuarios.php');
require (__DIR__ . '/Routes/Historial.php');

/**
 * Routes Obsevaciones
 */
Route::get('observaciones', ['as' => 'lista-observacion', 'uses' => 'ObservationsController@index']);


/**
 * Test
 */
Route::get('test', 'TestController@index');