<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Corso\models\Record;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Corso\models\DataCompanie;
use Maatwebsite\Excel\Facades\Excel;
use Corso\models\Business;
use Corso\models\Product;

class RecordsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function historialProductos($name) {
        /** Enviamos a buscar la empresa a consultar por el nombre recuperamos
         * el Id para consulta en productos
         * */
        $business = Business::where('name', $name)->get();
        /** consultamos con el ID de la empresa los productos que le pretenecen
         * y recuperamos los IDs de los productos de la empresa
         */
        $products = Product::where('empresas_id', $business[0]->id)->get();
        /** Recorremos los productos para hacer consulta de cada uno en el historial
         * para obtener cada uno de los registros de cada productos
         */
        foreach ($products AS $product):
            /** buscamos con el ID de los productos los instortiales para enviarlos 
             * como arreglos a la vista para mostras cada historial registrado
             */
            $record[] = Record::where('productos_id', $product->id)->get();
        endforeach;
        $records = $record;
        return View('record.index', compact('records'));
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

    public static function recordSeparator($id) {

        $Record = Record::find($id);
        $Record = explode(' ', strtolower($Record->products->name));
        switch (count($Record)):
            case 1:
                $Record = $Record[0];
                break;
            case 2:
                $Record = $Record[0] . '-' . $Record[1];
                break;
            case 3:
                $Record = $Record[0] . '-' . $Record[1] . '-' . $Record[2];
                break;
            case 4:
                $Record = $Record[0] . '-' . $Record[1] . '-' . $Record[2] . '-' . $Record[3];
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
        if ($verificacion->isEmpty() == false):

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
        $dataCompanie = DataCompanie::where('historials_id', '=', $id)->get();
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
                $sheet->fromArray($data, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

/**
 * Con este metodo generamos un archivo de PDF
 * para que puedan ver la información trabajada los clientes.
 * @param type $id
 * @return type
 */
    public function pdfClientes($id) {
        $dataCompanies = DataCompanie::where('historials_id', $id)->get();
        dd($dataCompanies);
        return view('claro.reportPdf', compact('dataCompanies'));
    }

/**
 * Con este metodo generamos un archivo de Excel
 * para que puedan ver la información trabajada los clientes.
 * @param type $id
 */
    public function descargasProductoClientes($id) {
        $historial = Record::find($id);
        $dataCompanie = DataCompanie::where('historials_id', $id)->get();
        $count = DataCompanie::where('historials_id', $id)->count();
        $separar = explode('/', $historial->url);
        $quitarExtencion = explode('.', $separar[2]);
        $data[] = array('N°', 'Codigo',
            'Nombre Cliente',
            'Tipo Cliente',
            'Estado',
            'Observaciones',
            'Comentario', 'Ciudad', 'Empleados'
        );
        $i = 0;
        foreach ($dataCompanie as $value):
            $i++;
            $data[] = array($i, $value->codigo,
                $value->tipo_cliente,
                $value->name_cliente,
                $value->observations->status->name,
                $value->observations->name,
                $value->comentario,
                $value->citys->name,
                $value->staffs->fname . ' ' . $value->staffs->flast
            );


        endforeach;
        $name = $value->records->products->business->name;
        $producto = $value->records->products->name;
        $mes = $value->records->mes;
        $year = $value->records->year;
        $count = $count + 2;
        Excel::create($name . ' ' . $mes . '-' . $year . ' ' . $producto, function($excel) use ($data, $count, $name, $producto, $mes, $year) {
            // Set the title
            $excel->setTitle('Reporte de Datos consultados');

            // Chain the setters
            $excel->setCreator('El Corso - Sistemas Amigables - Costa Rica')
                    ->setCompany('El Corso');

            // Call them separately
            $excel->setDescription('La información generada es de uso exclusivo de ' . $name);

            $excel->sheet($mes . '-' . $year . ' ' . $producto, function($sheet) use ($data, $count) {
                $sheet->mergeCells('A1:I1');
                $sheet->setAutoSize(true);
                $sheet->setFontBold(true);
                $sheet->setBorder('A1:I' . $count, 'thin');
                $sheet->cells('A1:I1', function($cells) {

                    // Set alignment to center
                    $cells->setAlignment('center');
                    // Set font
                    $cells->setBackground('#df0000');
                    // Set with font color
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family' => 'Calibri',
                        'size' => '16',
                        'bold' => true,
                    ));
                });
                $sheet->cells('A2:I2', function($cells) {
                    // Set font
                    $cells->setBackground('#df0000');
                    // Set with font color
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family' => 'Calibri',
                        'size' => '12',
                        'bold' => true,
                    ));
                });

                $sheet->row(1, array('Reporte de Entregas'));
                $sheet->fromArray($data, null, 'A2', false, false);
                //$sheet->row(1,$data);
            });
        })->export('xlsx');
    }

}
