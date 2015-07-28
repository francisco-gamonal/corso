@extends('template.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Observaciones</div>

                <div class="panel-body">
                    
                    <h1 class="text-lowercase">lista de Observaciones</h1>
                  
         
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
                                <td>{{ $datos->name }}</td>
                                <td>{{ $datos->status->name }}</td>
                                <td><a class="btn btn-warning "><span class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"><?= $observations->render() ?></div>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
