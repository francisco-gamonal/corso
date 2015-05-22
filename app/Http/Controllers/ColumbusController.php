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
       dd($periodo);
       // return View('columbus.importar', compact('columbus', 'periodo'));
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
