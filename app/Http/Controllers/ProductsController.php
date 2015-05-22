<?php

namespace Comer\Http\Controllers;

use Comer\Http\Requests;
use Comer\Http\Controllers\Controller;
use Comer\models\Product;
use Illuminate\Http\Request;
use Comer\models\Record;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
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

    public function getProduct($name) {

        $separador = explode('-', ($name));
        $numero = count($separador);
        switch ($numero):
            case 1:
               $nameProducto = ucwords($separador[0]) ;
                break;
            case 2:
                $nameProducto = ucwords($separador[0]) . ' ' . ucwords($separador[1]) ;
                break;
            case 3:
                $nameProducto = ucwords($separador[0]) . ' ' . ucwords($separador[1]) . '-' . $separador[2];
                break;
            case 4:
                $nameProducto = ucwords($separador[0]) . ' ' . ucwords($separador[1]) . '-' . $separador[2] . ' '.$separador[3];
                break;
            case ($numero >4):
               $nameProducto = '';
                break;
        endswitch;
 
        $producto = Product::where('name', '=', $nameProducto)->get();
        $inicioRecord = DB::table('historials')->where('productos_id','=',$producto[0]->id)->min('mes').'/'.DB::table('historials')->where('productos_id','=',$producto[0]->id)->min('year'); 
       $finalRecord = DB::table('historials')->where('productos_id','=',$producto[0]->id)->max('mes').'/'.DB::table('historials')->where('productos_id','=',$producto[0]->id)->max('year');
      
        return view('claro.product', compact('producto','inicioRecord','finalRecord'));
    }

}
