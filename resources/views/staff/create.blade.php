@extends('template.main')

@section('content')

<aside class="page"> 
    <ol class="breadcrumb">
        <li><a>Empleados</a></li>
        <li class="active">Registrar Empleado</li>
    </ol>
</aside>
<form id="formStaff" method="post" action="save">
    <section>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="fnameUser">Primer Nombre</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="fnameUser" name="fname" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="snameUser">Segundo Nombre</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="snameUser" name="sname" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="flastUser">Primer Apellido</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="flastUser" name="flast" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="slastUser">Segundo Apellido</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="slastUser" name="slast" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="charterUser">Cédula</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                    <input id="charterUser" name="cedula" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="phoneUser">Celular</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input id="phoneUser" name="celular" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-corso">
                <label for="cityUser">Ciudad</label>
                <select id="cityUser" name="ciudades_id" class="form-control">
                    @foreach($citys as $city)
                        <option value="{{$city->id}}">{{ mb_convert_case($city->name, MB_CASE_TITLE, "UTF-8") }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-sm-12 col-md-12 text-center">
            <a href="{{route('ver-empleados')}}" class="btn btn-default" style="margin-top:1em;"><span class="glyphicon glyphicon-circle-arrow-left"></span>Regresar</a>
            <button type="submit" class="btn btn-success" style="margin-top:1em;" data-type="post" data-url="save">
                <i class="fa fa-floppy-o"></i> Grabar Empleado
            </button>
        </div>
    </section>
</form>
@endsection