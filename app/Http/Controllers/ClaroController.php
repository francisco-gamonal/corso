<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Corso\Repositories\BusinessRepository;
use Corso\Repositories\CityRepository;
use Corso\Repositories\DataCompaniesRepository;
use Corso\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

use Input;
use Illuminate\Support\Facades\DB;
use Corso\Entities\Record;
use Corso\Entities\DataCompanie;
use Corso\Entities\City;
use Corso\Entities\Employee;
use Corso\Entities\Observation;
use Corso\Entities\Status;

class ClaroController extends baseUploadController {
    /**
     * @var BusinessRepository
     */
    private $businessRepository;
    /**
     * @var RecordsController
     */
    private $recordsController;
    /**
     * @var DataCompaniesRepository
     */
    private $dataCompaniesRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;


    /**
     * @param \Corso\Repositories\BusinessRepository $businessRepository
     * @param RecordsController $recordsController
     * @param \Corso\Repositories\DataCompaniesRepository $dataCompaniesRepository
     * @param \Corso\Repositories\CityRepository $cityRepository
     * @param \Corso\Repositories\EmployeeRepository $employeeRepository
     */
    public function __construct(
        BusinessRepository $businessRepository,
        RecordsController $recordsController,
        DataCompaniesRepository $dataCompaniesRepository,
        CityRepository $cityRepository,
        EmployeeRepository $employeeRepository
    )
    {
        
        set_time_limit(0);
        ini_set('memory_limit', '20240M');
        $this->businessRepository = $businessRepository;
        $this->recordsController = $recordsController;
        $this->dataCompaniesRepository = $dataCompaniesRepository;
        $this->cityRepository = $cityRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        return View('claro.index');
    }

    
    public function anyData()
    {
        return Datatables::of($this->employeeRepository->anyData())->make(true);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function importarClaro($id) {

        $data = $this->businessRepository->getModel()->find($id);
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
        
        //$this->fileJsonUpdate($periodIni[0],$periodIni[1], $periodFin[0],$periodFin[1]);
        $record = Record::where('product_id','=',$id->idProduct)
                ->where('month','>=',$periodIni[0])
                ->where('year','>=',$periodIni[1])
                ->where('month','<=',$periodFin[0])
                ->where('year','<=',$periodFin[1])->get();
        $historialId=$record[0]->id;
        
        foreach ($record AS $datos):
            $temp = DataCompanie::where('record_id','=',$datos->id)->with('cities')->with('observations')->with('employees')->with('status')->get();
            dd($temp[33]);
            $dataClaro[] = $temp;
            $temp = null;
        endforeach;

        $cities = City::all();
        $staffs = Employee::all();
        $observations = Observation::all();
        $status = Status::all();
        dd($dataClaro);
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

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-00-00
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: Con este Bloque recibimos de la vista los datos a trabajar
    |    Creamos las variables a utilizar, cambiamos el nombre del archivo
    |    de excel, y creamos la ruta donde almacenaremos nuestros archivos
    |@Pasos:
    |   1.
    |
    |
    |
    |
    |
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function importarExcelClaro() {
         #Paso 1
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
         $idHistorial = $this->recordsController->saveRecords($dia,$mes, $year, $producto, $url);

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
     * @param type $data
     * @param type $historial
     * @return type
     */
   private function saveExcel($data, $historial)
   {

        $this->dataCompaniesRepository->getModel()->where('record_id', $historial)->delete();

        foreach ($data AS $key => $dataExcel):


            $datos_empresas = $this->dataCompaniesRepository->getModel();
            $datos_empresas->bar = null;
            if (empty($dataExcel['codigo'])):
                $datos_empresas->code = null;
            else:
                $datos_empresas->code = $dataExcel['codigo'];
            endif;
            if (empty($dataExcel['tipo_cliente'])):
                $datos_empresas->customer_type = null;
            else:
                $datos_empresas->customer_type = $dataExcel['tipo_cliente'];
            endif;
            if (empty($dataExcel['telefono'])):
                $datos_empresas->phone = null;
            else:
                $datos_empresas->phone = $dataExcel['telefono'];
            endif;
            if (empty($dataExcel['nombre_cliente'])):
                $datos_empresas->customer_name = null;
            else:
                $datos_empresas->customer_name = $dataExcel['nombre_cliente'];
            endif;
            if (empty($dataExcel['comentario'])):
                $datos_empresas->comment = null;
            else:
                $datos_empresas->comment = $dataExcel['comentario'];
            endif;
            if (empty($dataExcel['fecha_entrega'])):
                $datos_empresas->date_delivered = null;
            else:
                $datos_empresas->date_delivered = $dataExcel['fecha_entrega'];
            endif;
            if (empty($dataExcel['fecha_recibido'])):
                $datos_empresas->date_received = null;
            else:
                $datos_empresas->date_received = $dataExcel['fecha_recibido'];
            endif;
            if (empty($dataExcel['monto'])):
                $datos_empresas->amount = null;
            else:
                $datos_empresas->amount = $dataExcel['monto'];
            endif;
            if (empty($dataExcel['direccion'])):
                $datos_empresas->address = null;
            else:
                $datos_empresas->address = $dataExcel['direccion'];
            endif;
            if (empty($dataExcel['comentario_ciudad'])):
                $datos_empresas->comment_town = null;
            else:
                $datos_empresas->comment_town = $dataExcel['comentario_ciudad'];
            endif;
           if (empty($dataExcel['ciudad'])):
                $datos_empresas->city_id = "";
            else:
                $datos_empresas->city_id = $this->cityRepository->returnName('name',$dataExcel['ciudad'],'id') ;
            endif;

           if (empty($dataExcel['observaciones'])):
                $datos_empresas->observation_id = 18;
           else:
                $datos_empresas->observation_id = $dataExcel['observaciones'];
           endif;
           $datos_empresas->record_id = $historial;
           if (empty($dataExcel['empleados'])):
                $datos_empresas->employee_id = null;
           else:
                $datos_empresas->employee_id = $this->cityRepository->returnName('name',$dataExcel['empleados'],'id');
           endif;
            $datos_empresas->save();
        endforeach;
        return $this->exito('Subio con exito el archivo de excel!!');
   }

}
