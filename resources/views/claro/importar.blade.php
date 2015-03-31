@extends('template.main')

@section('head')
	<meta name="description" content="Administración de Claro">
	<meta name="author" content="Sistemas Amigables">
	<title>Administración Claro</title>
@endsection

@section('content')
<center><h2><span class="glyphicon glyphicon-list-alt"><br>Importar Ciclos <img src="../logosclientes/logo-claro.png"></span></h2></center>
<hr>

<center>{{ Form::open(array(
            'action'=>'save-ciclo',
            'method'=>'POST',
            'files' => true,
            'role'=>'form',
            'enctype'=>'multipart/form-data',
            'class'=>'btn btn-success'
            ))}} 
    {{Form::file('excel')}}</br>
    {{Form::select('productos_id',$claro)}}
    {{Form::select('mes',$mes)}}
    {{Form::select('year',array(date('Y')=>date('Y')))}}

    {{Form::input('submit',null,'importar',array('class'=>'btn btn-danger '))}}
    {{Form::close()}}</center>

<hr>
<center><h2><span class="glyphicon glyphicon-list-alt"><br>Ejemplo</span></h2></center><br>
<center><img src="../../public/img/Ejemplo-Claro.png"></center>
@endsection