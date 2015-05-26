<?php 

/**
 * Claro
 */
Route::get('atlatida/estado-de-cuenta', ['as' => 'atlatida', 'uses' => 'BankAtlantidaController@index']);
//Route::get('columbus/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('atlatida/search', ['as' => 'data_product', 'uses' => 'BankAtlantidaController@dataProduct']);
Route::get('atlatida/importar-estado-de-cuenta/{id}', ['as' => 'importar-estado-de-cuenta', 'uses' => 'BankAtlantidaController@importarColumbus']);
Route::post('atlatida/importar-estado-de-cuenta', ['as' => 'save-estado-de-cuenta', 'uses' => 'BankAtlantidaController@importarExcelColumbus']);
Route::post('atlatida/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);
Route::get('atlatida/ciclo', 'BusinessController@ListaDatosEmpresas');
