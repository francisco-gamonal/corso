@extends('template.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">


                    <center><h2><span class="glyphicon glyphicon-list-alt"><br>Agregar Mensajeros</span></h2></center>
                    <hr>
                    <div class="right">
                    
                        {!! Html::link('registrar-empleados','Agregar +',array('class'=>'btn btn-danger ')) !!}
                    </div>

                    <hr>
                    @if(isset($message))
                    <div class="text text-info">
                        <button type="button" class="close" data-dismiss="info">&times;</button>
                        <ul>
                            <li><span class="glyphicon glyphicon-ok"></span> {{$message}}</li>
                        </ul>
                    </div>
                    @endif
                    <div >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Ciudad</th>
                                    <th>Cedula</th>
                                    <th>Celular</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody><?php $i = 0; ?>
                                @foreach($staff AS $datos) 
                                <tr>
                                    <td>{{$datos->id}}</td>
                                    <td>{{$datos->fname}} {{$datos->sname}} {{$datos->flast}} {{$datos->slast}}</td>
                                    <td>{{ $datos->ciudad }}</td>
                                    <td>{{ $datos->cedula }}</td>
                                    <td>{{ $datos->celular }}</td>
                                    @if($datos->estado==0)
                                    <td>Activo</td>
                                    @elseif($datos->esatdo==1)
                                    <td>Desactivo</td>
                                    @endif
                                    <td ><a class="btn btn-primary" href="{{route('editar-empleados', $datos->id)}}" >Editar</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"><?php echo $staff->render(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
