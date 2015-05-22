<<<<<<< HEAD
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

require (__DIR__ . '/Routes/Claro.php');
require (__DIR__ . '/Routes/Columbus.php');
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