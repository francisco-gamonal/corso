<?php 

/**
 * Claro
 */
Route::get('columbus/estado-de-cuenta', ['as' => 'columbus', 'uses' => 'ColumbusController@index']);
//Route::get('columbus/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('columbus/search', ['as' => 'data_product', 'uses' => 'ColumbusController@dataProduct']);
Route::get('columbus/importar-estado-de-cuenta/{id}', ['as' => 'importar-estado-de-cuenta', 'uses' => 'ColumbusController@importarColumbus']);
Route::post('columbus/importar-estado-de-cuenta', ['as' => 'save-estado-de-cuenta', 'uses' => 'ColumbusController@importarExcelColumbus']);
Route::post('columbus/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);
Route::get('columbus/ciclo', 'BusinessController@ListaDatosEmpresas');
