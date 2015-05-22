<?php namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Corso\models\Business;
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
        $claro = $data->Products()->lists('name', 'id');
        array_unshift($claro, ' --- Seleccione un Prodcuto --- ');
        $mes = $this->Mes();
        return View('claro.importar', compact('claro', 'mes'));
    }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
