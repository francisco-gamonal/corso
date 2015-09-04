<?php

/**
 *  Routes Historial
 */
Route::get('historial-productos/{name}', ['as' => 'historial-productos', 'uses' => 'RecordsController@productRecord']);
Route::put('historial-delete/{id}', ['as' => 'historial-delete', 'uses' => 'RecordsController@destroy']);
Route::get('descarga-productos/{id}', ['as' => 'descarga-productos', 'uses' => 'RecordsController@descargasProducto']);
Route::get('descarga-clientes/{id}', ['as' => 'descarga-clientes', 'uses' => 'RecordsController@descargasProductoClientes']);
Route::get('eliminar-historial/{id}', ['as' => 'eliminar-productos', 'uses' => 'RecordsController@delete']);
Route::get('pdf-clientes/{id}', ['as' => 'pdf-clientes', 'uses' => 'RecordsController@pdfClientes']);
