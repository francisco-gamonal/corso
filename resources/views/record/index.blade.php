@extends('template.main')

@section('head')
	<meta name="description" content="Administración de Claro">
	<meta name="author" content="Sistemas Amigables">
	<title>Administración Claro</title>
@endsection

@section('content')
<div class="menu-inicio">
    <div CLASS="titulo-bienvenido">Historial de Ciclos <img src="http://systema.elcorso.hn/img/logo-claro.png"></div>
    <table class="table table-striped">
        <thead>
        <th>Nombre Producto</th>
        <th>Mes</th>
        <th>Year</th>
        <th>Cantidad Filas</th>
        <!--th>En Ruta</th>
        <th>Entregado</th>
        <th>Devolucion</th-->
        <th>Descargar</th>
        <th>Eliminar</th>
        </thead>
        @foreach($record AS $datos)
        <tbody>
            <tr>
                <td>{{$datos->products->name}}</td>
                <td>{{$datos->mes}}</td>
                <td>{{$datos->year}}</td>
                <td>{{$datos->DataCompanies->count()}}</td>
                <!--td></td>
                <td></td>
                <td></td-->
                <td><a class="btn btn-default" href="{{route('descarga-productos',$datos->id)}}"><span class="glyphicon glyphicon-cloud-download"> </span></a></td>
                <td><a class="btn btn-danger" href=""><span class="glyphicon glyphicon-remove-circle"> 
                        </span></a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>	
</div>
@endsection