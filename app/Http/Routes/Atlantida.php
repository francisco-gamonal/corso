<?php 

/**
 * Claro
 */
Route::get('atlantida/estado-de-cuenta', ['as' => 'atlantida', 'uses' => 'BankAtlantidaController@index']);
//Route::get('columbus/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('atlantida/search', ['as' => 'data_product', 'uses' => 'BankAtlantidaController@dataProduct']);
Route::get('atlantida/importar-estado-de-cuenta/{id}', ['as' => 'importar-estado-atlantida', 'uses' => 'BankAtlantidaController@importarAtalntida']);
Route::post('atlantida/importar-estado-de-cuenta', ['as' => 'save-estado-de-cuenta', 'uses' => 'BankAtlantidaController@importarExcelColumbus']);
Route::post('atlantida/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);
Route::get('atlantida/ciclo', 'BusinessController@ListaDatosEmpresas');
