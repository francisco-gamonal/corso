<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Corso\models\Record;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Corso\models\DataCompanie;
use Maatwebsite\Excel\Facades\Excel;
class RecordsController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $record = Record::all();
        return View('record.index', compact('record'));
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
    
    public static function recordSeparator($id){
        
        $Record = Record::find($id);
       $Record = explode(' ', strtolower($Record->products->name));
              switch (count($Record)):
                  case 1:
                      $Record = $Record[0];
                      break;
                  case 2:
                      $Record = $Record[0].'-'.$Record[1];
                      break;
                  case 3:
                      $Record =  $Record[0].'-'.$Record[1].'-'.$Record[2];
                      break;
                  case 4:
                      $Record = $Record[0].'-'.$Record[1].'-'.$Record[2].'-'.$Record[3];
                      break;
              endswitch;
        
        return $Record;
    }

    /**
     * @author Anwar Sarmiento
     * @param type $mes
     * @param type $year
     * @param type $producto
     * @return type
     * @description  Guardamos el historial de los productos 
     */
    public static function SaveHistorials($mes, $year, $producto, $url) {
        /* Buscamos ver si ya existe el archivo que se quiere agregar */
        $verificacion = Record::where('mes', '=', $mes)
                        ->where('year', '=', $year)
                        ->where('productos_id', '=', $producto)->get();
       
        /* si existe enviamos el id */
        if ($verificacion->isEmpty()==false):
            
            return $verificacion[0]->id;
        
        endif;
        /*  de lo contrario agregamos el nuevo historial */
        $Historial = new Record;
        $Historial->mes = $mes;
        $Historial->year = $year;
        $Historial->productos_id = $producto;
        $Historial->url = $url;
        $Historial->save();
        
        /* Retornamos el id de la nueva fila */
        $id = Record::all()->last();
        return $id->id;
    }

    public function descargasProducto($id) {
        $historial = Record::find($id);
        $dataCompanie = DataCompanie::where('historials_id','=',$id)->get();
        $separar = explode('/', $historial->url);
        $quitarExtencion = explode('.', $separar[2]);
        $data = array();
        $data[] = array('Codigo',
            'Tipo Cliente',
            'Telefono',
            'Nombre Cliente',
            'Ciudad',
            'estado',
            'observaciones',
            'Comentario',
            'Fecha Entrega',
            'fecha Recibido',
            'monto',
            'direccion',
            'comentario ciudad', 'empleados');
        foreach ($dataCompanie as $value):
            
            $data[] = array($value->codigo,
                $value->tipo_cliente,
                $value->telefono,
                $value->name_cliente,
                $value->ciudades_id,
                $value->observations->status->name,
                $value->observations->id,
                $value->comentario,
                $value->fecha_entregado,
                $value->fecha_recibido,
                $value->monto,
                $value->direccion,
                $value->comentario_ciudad,
                $value->empleados_id
            );

//
        endforeach;

        Excel::create($quitarExtencion[0], function($excel) use ($data) {

            $excel->sheet('Datos Descargados', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

}
