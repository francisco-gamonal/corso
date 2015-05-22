<?php namespace Comer\Http\Controllers;

use Comer\Http\Requests;
use Comer\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Comer\models\Business;
class ColumbusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 return View('columbus.index');
	}

	    /**
     * 
     * @param type $id
     * @return type
     */
    public function importarColumbus($id) {

        $data = Business::find($id);
        $columbus = $data->Products()->lists('name', 'id');
        $periodo = $this->mes();
        return View('columbus.importar', compact('columbus', 'periodo'));
    }
 /**
     * aqui ejecutamos todos los metodos para agregar un nuevo archivo o reemplazarlo
     * @return type
     */
    public function importarExcelClaro() {
        /* de claramos las variables que recibimos por post */
        $mes = Input::get('mes');
        $year = Input::get('year');
        $producto = Input::get('productos_id');
        $file = Input::file('excel');
        $url = "files/claro/CICLO" . $producto . str_pad($mes, 2, '0', STR_PAD_LEFT) . $year . ".xlsx";
        /* agregamos un nuevo historial y retornamos el ID o buscamos regresamos el ID */
        $idHistorial = RecordsController::SaveHistorials($mes, $year, $producto, $url);

        /* Corremos el archivo de excel y lo convertimos en un array */
        $excel = BusinessController::uploadExcel($file, 'claro', 'CICLO' . $producto . str_pad($mes, 2, '0', STR_PAD_LEFT) . $year . '.xlsx');

        return $this->saveExcel($excel, $idHistorial);
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
