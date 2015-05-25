<?php namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BusinessController extends Controller {

   
    
    public function __construct() {
       
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
 /**
     * 
     * @param type $file
     * @param string $path
     * @param type $fileName
     * @return boolean
     * 
     */
    public static function uploadExcel($file, $path, $fileName) {
         $MaatExcel = App::make('excel');
        $path = 'files/' . $path;
        if (strtoupper($file->getClientOriginalExtension()) == 'XLSX' || strtoupper($file->getClientOriginalExtension()) == 'XLS'):
            $file->move($path, $fileName);
            $files = $path . '/' . $fileName;
            $excel = $MaatExcel->load($files, function ($reader) {
                        $reader->formatDates(true, 'Y-m-d');
                    })->all();

            return $excel;
        endif;
        return false;
    }

    public function scanearCiclo() {
        $data = Input::all();

        $Producto = Historial::where('mes', '=', $data['mes'])->where('year', '=', $data['year'])->where('productos_id', '=', $data['ciclo'])->get();
        if (($Producto)):
            DB::update("UPDATE datos_empresas SET observaciones_id = 17 WHERE historials_id =  " . $Producto[0]->id . "  AND codigo = " . $data['id']);

            if ($data['ciclo'] == 1):
                return Redirect::to('claros/scanearc46tv');
            elseif ($data['ciclo'] == 2):
                return Redirect::to('claros/scanearc46movil');
            elseif ($data['ciclo'] == 3):
                return Redirect::to('claros/scanearc48');
            endif;
        endif;
        if ($data['ciclo'] == 1):
            return Redirect::to('claros/scanearc46tv')->with('message', 'No se cambio el estado');
        elseif ($data['ciclo'] == 2):
            return Redirect::to('claros/scanearc46movil')->with('message', 'No se cambio el estado');
        elseif ($data['ciclo'] == 3):
            return Redirect::to('claros/scanearc48')->with('message', 'No se cambio el estado');
        endif;
    }
}
