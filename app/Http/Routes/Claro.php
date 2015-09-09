<?php 

/**
 * Claro
 */

Route::get('claro', ['as' => 'claro', 'uses' => 'ClaroController@index']);
Route::get('claro/lista/{name}', ['as' => 'producto_claro', 'uses' => 'ProductsController@getProduct']);
Route::post('claro/lista/search', ['as' => 'data_product', 'uses' => 'ClaroController@dataProduct']);
Route::get('claro/importar-ciclo/{id}', ['as' => 'importar-ciclo', 'uses' => 'ClaroController@importarClaro']);
Route::post('claro/importar-ciclo', ['as' => 'save-ciclo', 'uses' => 'ClaroController@importarExcelClaro']);
Route::post('claro/scanear-ciclo', ['as' => 'scanear-ciclo', 'uses' => 'BusinessController@scanearCiclo']);
Route::get('claro/ciclo', 'BusinessController@ListaDatosEmpresas');

/*Route::controller('claro', 'ClaroController', [
    'anyData'  => 'claro.list',
    //'getIndex' => 'empleados',
]);*/