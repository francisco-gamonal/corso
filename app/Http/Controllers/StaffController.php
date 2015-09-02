<?php

namespace Corso\Http\Controllers;

use Corso\Http\Controllers\Controller;
use Corso\Http\Requests;
use Corso\models\City;
use Corso\models\Empleado;
use Corso\models\Staff;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class StaffController extends Controller {



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index() {

        $empleados = Empleado::all();
        return View('staff.index', compact('empleados'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create() {

        $citys = City::all();
        return View('staff.create', compact('citys'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store() {

        $empleados = Input::all();
        $empleado = new Empleado($empleados);

        /* Validamos los datos para guardar tabla menu */
        if ($empleado->isValid($empleados)):
            $empleado->fill($empleados);
            $empleado->save();
            /* Enviamos el mensaje de guardado correctamente */
            return $this->exito('Se guardaron los datos con éxito.');
        endif;
        /* Enviamos el mensaje de error */
        return $this->errores($empleado->errors);
        //return Redirect::route('registrar-empleados')->withInput()->withErrors($empleado->errors);

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

        $empleado = Empleado::find($id);
        $citys = City::all();
        return View('staff.edit', compact('empleado', 'citys'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id) {

        $empleados = Input::all();
        $empleado = Empleado::find($empleados['id']);

       /* Validamos los datos para guardar tabla menu */
        if ($empleado->isValid($empleados)):
            $empleado->fill($empleados);
            $empleado->save();
            /* Enviamos el mensaje de guardado correctamente */
            return $this->exito('Se guardaron los datos con éxito.');
        endif;
        /* Enviamos el mensaje de error */
        return $this->errores($empleado->errors);
        //return Redirect::route('registrar-empleados')->withInput()->withErrors($empleado->errors);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id) {
        /* Capturamos los datos enviados por ajax */
        $data = $this->convertionObjeto();
        /* les damos eliminacion pasavida */
        $empleado = Empleado::destroy($data->idEmpleado);
        if($empleado){
            /* si todo sale bien enviamos el mensaje de exito */
            return $this->exito('Se desactivo al empleado con éxito.');
        }
        /* si hay algun error  los enviamos de regreso */
        return $this->errores($empleado->errors);
    }

    /**
     * Restore the specified typeuser from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function active($id)
    {
        /* Capturamos los datos enviados por ajax */
        $data = $this->convertionObjeto();
        /* les quitamos la eliminacion pasavida */
        $empleado = Empleado::onlyTrashed()->find($data->idEmpleado);
        if ($data){
            $data->restore();
            /* si todo sale bien enviamos el mensaje de exito */
            return $this->exito('Se activo al empleado con éxito.');
        }
        /* si hay algun error  los enviamos de regreso */
        return $this->errores($empleado->errors);
    }

}
