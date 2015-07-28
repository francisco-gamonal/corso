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
use Corso\models\City;
use Corso\models\Staff;
use Corso\models\Observation;
use Corso\models\Statu;
use Illuminate\Support\Facades\DB;

class ClaroController extends baseUploadController {

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
     * 
     * @param type $id
     * @return type
     */
    public function importarClaro($id) {

        $data = Business::find($id);
        $claro = $data->Products;
        $periodo = $this->mes();
        return View('claro.importar', compact('claro', 'periodo'));
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
        $id = $this->convertionObjeto();
       
       // $this->fileJsonUpdate($periodIni[0],$periodIni[1], $periodFin[0],$periodFin[1]);
        $record = Record::where('productos_id','=',$id->idProduct)
                ->where('mes','>=',$periodIni[0])
                ->where('year','>=',$periodIni[1])
                ->where('mes','<=',$periodFin[0])
                ->where('year','<=',$periodFin[1])->get();
        $historialId=$record[0]->id;
        
        foreach ($record AS $datos):
            $temp = DataCompanie::where('historials_id','=',$datos->id)->get();
            $dataClaro[] = $temp;
            $temp = null;
        endforeach;

        $cities = City::all();
        $staffs = Staff::all();
        $observations = Observation::all();
        $status = Statu::all();

        $view = view('claro.dataProduct', compact('dataClaro','historialId', 'cities', 'staffs', 'observations', 'status'));
        
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
         try {
            DB::beginTransaction();
         $mes = str_split(Input::get('datePicker'), 2);
            $dia = "";
            $mes = $mes[0];
            $year = date('Y');
        $producto = Input::get('productClaro');
        $file = Input::file('excel');
        $url = "files/claro/CICLO" . $producto . str_pad($mes, 2, '0', STR_PAD_LEFT) . $year . ".xlsx";
        /* agregamos un nuevo historial y retornamos el ID o buscamos regresamos el ID */
        $idHistorial = RecordsController::SaveHistorials($dia,$mes, $year, $producto, $url);

        /* Corremos el archivo de excel y lo convertimos en un array */
        $excel = BusinessController::uploadExcel($file, 'claro', 'CICLO' . $producto . str_pad($mes, 2, '0', STR_PAD_LEFT) . $year . '.xlsx');

          DB::commit();
            return $this->saveExcel($excel, $idHistorial);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
            return $this->errores(array('key' => 'Error Al subir el archivo de Excel'));
        }
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
           if (empty($dataExcel['ciudad'])):
                $datos_empresas->ciudades_id = "";
            else:
                $datos_empresas->ciudades_id = $dataExcel['ciudad'];
            endif;
            
            
            if (empty($dataExcel['observaciones'])):
                $datos_empresas->observaciones_id = 18;
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
        return $this->exito('Subio con exito el archivo de excel!!');
    }

}
