<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanckAtlantidaController extends Controller {

    /**
     * 
     * @param type $id
     * @return type
     */
    public function importarAtlantidad($id) {

        $data = Business::find($id);
        $atlantida = $data->Products;
        $periodo = $this->mes();
        return View('atlantida.importar', compact('atlantida', 'periodo'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $producto = Product::where('id', 4)->get();
        $inicioRecord = DB::table('historials')->where('productos_id', '=', $producto[0]->id)->min('mes') . '/' . DB::table('historials')->where('productos_id', '=', $producto[0]->id)->min('year');
        $finalRecord = DB::table('historials')->where('productos_id', '=', $producto[0]->id)->max('mes') . '/' . DB::table('historials')->where('productos_id', '=', $producto[0]->id)->max('year');

        return View('atlantida.product', compact('producto', 'inicioRecord', 'finalRecord'));
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
        $record = Record::where('productos_id', '=', $id->idProduct)
                        ->where('mes', '>=', $periodIni[0])
                        ->where('year', '>=', $periodIni[1])
                        ->where('mes', '<=', $periodFin[0])
                        ->where('year', '<=', $periodFin[1])->get();
        $historialId = $record[0]->id;

        foreach ($record AS $datos):
            $temp = DataCompanie::where('historials_id', '=', $datos->id)->get();
            $dataClaro[] = $temp;
            $temp = null;
        endforeach;

        $cities = City::all();
        $staffs = Staff::all();
        $observations = Observation::all();
        $status = Statu::all();

        $view = view('atlantida.dataProduct', compact('dataClaro', 'historialId', 'cities', 'staffs', 'observations', 'status'));

        return $view;
    }
/**
     * aqui ejecutamos todos los metodos para agregar un nuevo archivo o reemplazarlo
     * @return type
     */
    public function importarExcelColumbus() {
        /* de claramos las variables que recibimos por post */
        try {
            DB::beginTransaction();
            $mes = str_split(Input::get('datePicker'), 2);
            $mes = $mes[0];
            $year = date('Y');
            $producto = Input::get('productos_id');
            $file = Input::file('excel');
            $url = "files/atlantida/CICLO" . $producto . str_pad($mes, 2, '0', STR_PAD_LEFT) . $year . ".xlsx";
            /* agregamos un nuevo historial y retornamos el ID o buscamos regresamos el ID */
            $idHistorial = RecordsController::SaveHistorials($mes, $year, $producto, $url);

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


        return $this->exito('Se Subio con exito el archivo de Excel');
    }

}
