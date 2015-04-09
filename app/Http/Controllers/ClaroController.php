<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Corso\models\Business;
use Corso\models\Product;
use Corso\models\DataCompanie;
use Illuminate\Support\Facades\Redirect;
use Corso\models\Record;
use Input;

class ClaroController extends Controller {

    public function __construct() {
        
        set_time_limit(0);
        ini_set('memory_limit', '20240M');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        return View('claro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function importarClaro($id) {

        $data = Business::find($id);
        $claro = $data->Products()->lists('name', 'id');
        array_unshift($claro, ' --- Seleccione un Prodcuto --- ');
        $mes = $this->Mes();
        return View('claro.importar', compact('claro', 'mes'));
    }

    /**
     * 
     * @return type
     */
    public function dataProduct() {
        set_time_limit(0);
        ini_set('memory_limit', '20240M'); 
        
        $periodIni = $this->period(0);
        $periodFin = $this->period(1);
        $id = 3;
       // $this->fileJsonUpdate($periodIni[0],$periodIni[1], $periodFin[0],$periodFin[1]);
        $record = Record::where('productos_id','=',$id)
                ->where('mes','>=',$periodIni[0])
                ->where('year','>=',$periodIni[1])
                ->where('mes','<=',$periodFin[0])
                ->where('year','<=',$periodFin[1])->get();
        
        foreach ($record AS $datos):
            $temp = DataCompanie::where('historials_id','=',$datos->id)->get();
            $dataClaro[] = $temp;
            $temp = null;
        endforeach;

        $view = view('claro.dataProduct', compact('dataClaro'));
        
        return $view;
    }
    
     public function fileJsonUpdate($mesIni,$yearIni, $mesFin,$yearFin) {
        /* Buscamos todos los datos de school y traemos solo el id y el name */
        $record = Record::where('productos_id','=',3)
                ->where('mes','>=',$mesIni)
                ->where('year','>=',$yearIni)
                ->where('mes','<=',$mesFin)
                ->where('year','<=',$yearFin)->get();
        $dataJson = '';
        foreach ($record AS $records):
             $dataCompanie = DataCompanie::where('historials_id','=',$records->id)->get();
            $dataJson[] = $dataCompanie;
        endforeach;

        $fh = fopen("json/dataCompanie.json", 'w')
                or die("Error al abrir fichero de salida");
        fwrite($fh, json_encode($dataJson, JSON_UNESCAPED_UNICODE));
        fclose($fh);
    }
    /**
     * Separamos en rango de la consulta por perido
     * @param type $range
     * @return type
     */
    private function serparatorPeriodo($range) {
      $rangeSeparator = explode('-', $range);
        return $rangeSeparator;
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    private function period($id) {
        $range = $this->convertionObjeto();
        $period = $this->serparatorPeriodo($range->range);
        $period = explode('/', trim($period[$id]));
        return ($period);
    }

   /**
     * Mostramos todos los datos en la vista de la tabla Datos empresas de claro
     * @return type
     */
    public function ListaDatosEmpresas() {
        $datosEmpresas = DataCompanie::paginate(100);
        return View('claro.listaDatosEmpresas', compact('datosEmpresas'));
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
     * 
     * @param type $data
     * @param type $historial
     * @return type
     */
    private function saveExcel($data, $historial) {

        $datos = DataCompanie::where('historials_id', '=', $historial)->delete();

        foreach ($data AS $dataExcel):
            $datos_empresas = new DataCompanie;
            $datos_empresas->barra = null;
            if (empty($dataExcel['codigo'])):
                $datos_empresas->codigo = null;
            else:
                $datos_empresas->codigo = $dataExcel['codigo'];
            endif;
            if (empty($dataExcel['tipo_cliente'])):
                $datos_empresas->tipo_cliente = null;
            else:
                $datos_empresas->tipo_cliente = $dataExcel['tipo_cliente'];
            endif;
            if (empty($dataExcel['telefono'])):
                $datos_empresas->telefono = null;
            else:
                $datos_empresas->telefono = $dataExcel['telefono'];
            endif;
            if (empty($dataExcel['nombre_cliente'])):
                $datos_empresas->name_cliente = null;
            else:
                $datos_empresas->name_cliente = $dataExcel['nombre_cliente'];
            endif;
            if (empty($dataExcel['comentario'])):
                $datos_empresas->comentario = null;
            else:
                $datos_empresas->comentario = $dataExcel['comentario'];
            endif;
            if (empty($dataExcel['fecha_entrega'])):
                $datos_empresas->fecha_entregado = null;
            else:
                $datos_empresas->fecha_entregado = $dataExcel['fecha_entrega'];
            endif;
            if (empty($dataExcel['fecha_recibido'])):
                $datos_empresas->fecha_recibido = null;
            else:
                $datos_empresas->fecha_recibido = $dataExcel['fecha_recibido'];
            endif;
            if (empty($dataExcel['monto'])):
                $datos_empresas->monto = null;
            else:
                $datos_empresas->monto = $dataExcel['monto'];
            endif;
            if (empty($dataExcel['direccion'])):
                $datos_empresas->direccion = null;
            else:
                $datos_empresas->direccion = $dataExcel['direccion'];
            endif;
            if (empty($dataExcel['comentario_ciudad'])):
                $datos_empresas->comentario_ciudad = null;
            else:
                $datos_empresas->comentario_ciudad = $dataExcel['comentario_ciudad'];
            endif;
            $datos_empresas->ciudades_id = CityController::convertionCiudad($dataExcel['ciudad']);
            if (empty($dataExcel['observaciones'])):
                $datos_empresas->observaciones_id = 16;
            else:
                $datos_empresas->observaciones_id = $dataExcel['observaciones'];
            endif;
            $datos_empresas->historials_id = $historial;
            if (empty($dataExcel['empleados'])):
                $datos_empresas->empleados_id = null;
            else:
                $datos_empresas->empleados_id = $dataExcel['empleados'];
            endif;
            $datos_empresas->save();
        endforeach;
        $Record = RecordsController::recordSeparator($historial);
        return Redirect::away($Record)->with('messege', 'se guardo con exito!!');
    }

}
