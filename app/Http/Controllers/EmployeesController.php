<?php

namespace Corso\Http\Controllers;

use Corso\Entities\Employee;
use Corso\Http\Controllers\Controller;
use Corso\Http\Requests;

use Corso\Repositories\CityRepository;
use Corso\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use yajra\Datatables\Datatables;

class EmployeesController extends Controller {
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;


    /**
     * @param \Corso\Repositories\EmployeeRepository $employeeRepository
     * @param \Corso\Repositories\CityRepository $cityRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        CityRepository $cityRepository
    )
    {
        $this->employeeRepository = $employeeRepository;
        $this->cityRepository = $cityRepository;
    }
    public function anyData()
    {
        return Datatables::of($this->employeeRepository->anyData())->make(true);
    }
    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: En el index enviamos la lista de empleados
    |----------------------------------------------------------------------
    | @return view
    |----------------------------------------------------------------------
    */
    public function getIndex() {
        //dd("OK");
        return View('staff.index');
    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: enviamos los departamentos para generar el create
    |----------------------------------------------------------------------
    | @return view
    |----------------------------------------------------------------------
    */
    public function getCreate() {

        $citys =$this->cityRepository->all();
        return View('staff.create', compact('citys'));

    }

    /*
    |---------------------------------------------------------------------
    |@Author: Anwar Sarmiento <asarmiento@sistemasamigables.com
    |@Date Create: 2015-09-02
    |@Date Update: 2015-00-00
    |---------------------------------------------------------------------
    |@Description: recibimos los datos del formulario por el request y los
    | datos los pasamos por el validador insertamos en la tabla
    |----------------------------------------------------------------------
    | @return mixed
    |----------------------------------------------------------------------
    */
    public function postSave(Request $request) {

        $empleados = $request->all();
        $empleado = $this->employeeRepository->getModel();
        if ($empleado->isValid((array) $empleados)):
            $empleado->fill($empleados);
            $empleado->save();
            return $this->exito('Se ingresaron los datos con éxito.');
        endif;
        return $this->errores($empleado->errors);
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
