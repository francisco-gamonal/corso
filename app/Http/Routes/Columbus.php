<?php 

/**
 * Claro
 */
Route::get('columbus/estado-de-cuenta', ['as' => 'columbus', 'uses' => 'ColumbusController@index']);
//Route::get('columbus/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('columbus/search', ['as' => 'data_product', 'uses' => 'ColumbusController@dataProduct']);
Route::get('columbus/importar-ciclo/{id}', ['as' => 'importar-ciclo', 'uses' => 'ColumbusController@importarClaro']);
Route::post('columbus/importar-ciclo', ['as' => 'save-ciclo', 'uses' => 'ColumbusController@importarExcelClaro']);
Route::post('columbus/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);
Route::get('columbus/ciclo', 'BusinessController@ListaDatosEmpresas');
