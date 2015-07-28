@extends('template.main')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.min.css') }}">
@endsection

@section('content')
<br>
<aside class="page"> 
    <ol class="breadcrumb">
        <li><a class="active">Empleados</a></li>
    </ol>
</aside>

<div class="paddingWrapper">
    <section class="row">
        <div class="table-data">
            <div class="table-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5><strong>Lista de Empleados</strong></h5>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('crear-empleados')}}" class="btn btn-info pull-right">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>Nuevo</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-content">
                <div class="table-responsive">
                    <table id="table_empleado" class="table table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th width="200">Nombre</th>
                                <th>Ciudad</th>
                                <th>Cédula</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th>Edición</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                                <tr>
                                    <td class="text-center id_empleado">{{ $empleado->id }}</td>
                                    <td>{{ mb_convert_case($empleado->nameComplete(), MB_CASE_TITLE, 'utf-8') }}</td>
                                    <td class="text-center">{{ mb_convert_case($empleado->citys->name, MB_CASE_TITLE, 'utf-8') }}</td>
                                    <td class="text-center">{{ $empleado->cedula }}</td>
                                    <td class="text-center">{{ $empleado->celular }}</td>
                                    <td class="text-center">
                                        @if($empleado->deleted_at)
                                            <span>Inactivo</span>
                                        @else
                                            <span>Activo</span>
                                        @endif
                                    </td>
                                    <td class="text-center edit-row">
                                        @if($empleado->deleted_at)
                                            <!--a id="activeEmpleado" data-url="empleados" href="#">
                                                <i class="fa fa-check-square-o"></i>
                                            </a-->
                                        @else
                                            <!--a id="deleteEmpleado" data-url="empleados" href="#">
                                                <i class="fa fa-trash-o"></i>
                                            </a-->
                                        @endif
                                        <a href="{{route('editar-empleados', $empleado->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js') }}"></script>
@endsection