<?php

namespace Corso\Http\Controllers;

use Corso\Http\Requests;
use Corso\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Corso\models\Staff;
use Illuminate\View\View;

class StaffController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $staff = Staff::paginate(100);
        return View('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $ciudades = Ciudade::lists('name', 'id');
        return View::make('staff.create', compact('ciudades'));
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
        if ($empleado->isValid((array) $empleados)):
            $empleado->fill($empleados);
            $empleado->save();
            /* Enviamos el mensaje de guardado correctamente */
            return Redirect::route('ver-empleados')->with(array('message' => 'Los datos se guardaron con exito!!!'));
        endif;
        /* Enviamos el mensaje de error */
        return Redirect::route('registrar-empleados')->withInput()->withErrors($empleado->errors);
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
        $ciudades = Ciudade::lists('name', 'id');
        return View::make('staff.edit', compact('empleado', 'ciudades'));
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
        $empleado->fill($empleados);
        $empleado->save();
        /* Enviamos el mensaje de guardado correctamente */
        return Redirect::route('ver-empleados')->with(array('message' => 'Los datos se guardaron con exito!!!'));
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

}
