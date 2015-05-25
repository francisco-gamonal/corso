@extends('template.main')

@section('head')
    <meta name="description" content="Administración de {{mb_convert_case($business[0]->name, MB_CASE_TITLE, 'UTF-8')}}">
    <meta name="author" content="Sistemas Amigables">
    @section('tittle')
        Administración {{mb_convert_case($business[0]->name, MB_CASE_TITLE, 'UTF-8')}}
    @endsection
@endsection

@section('content')
<div class="menu-inicio">
    <div CLASS="titulo-bienvenido">Historial de Ciclos <img src="http://systema.elcorso.hn/img/logosclientes/{{$business[0]->logo}}"></div>
    <table class="table table-striped">
        <thead>
            <th>Nombre Producto</th>
            <th>Mes</th>
            <th>Year</th>
            <th>Cantidad Filas</th>
    <!--        <th>En Ruta</th>
            <th>Entregado</th>
            <th>Devolucion</th>-->
            <th>Descargar</th>
            <th>Cliente</th>
            <th>Eliminar</th>
        </thead>
        @for($i=0;$i < count($records);$i++)
            @foreach($records[$i] AS $record)
            <tbody>
                <tr>
                    <td>{{$record->products->name}}</td>
                    <td>{{$record->mes}}</td>
                    <td>{{$record->year}}</td>
                    <td>{{$count[$record->id]}}</td>
    <!--                <td></td>
                    <td></td>
                    <td></td>-->
                    <td><a target="_black" class="btn btn-default" href="{{route('descarga-clientes',$record->id)}}"><span class="glyphicon glyphicon-cloud-download"> </span></a></td>
                    <td><a target="_black" class="btn btn-default" href="{{route('descarga-clientes',$record->id)}}"><span class="glyphicon glyphicon-cloud-download"> </span></a></td>
                    <td><a class="btn btn-danger" href=""><span class="glyphicon glyphicon-remove-circle"> 
                            </span></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        @endfor
    </table>	
</div>  
@endsection