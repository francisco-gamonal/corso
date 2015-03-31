@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @section('title')
                    <h1 class="text-lowercase"><?php echo utf8_encode('lista de Observaciones'); ?></h1>
                    @stop
                    @section('content')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($observations AS $datos) 
                            <tr>
                                <td>{{$datos->id}}</td>
                                <td>{{ $datos->name; }}</td>
                                <td>{{ $datos->estados->name; }}</td>
                                <td><a class="btn btn-warning "><span class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">{{ $observaciones->links() }}</div>
                    @stop
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
