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
                        <a href="{!! route('crear-empleados') !!}" class="btn btn-info pull-right">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>Nuevo</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-content">
                <div class="table-responsive">
                    <table id="employees-table" class="table table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">
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

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#employees-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('empleados.list') !!}',
                columns: [
            {data: 'id', name: 'id'},
            {data: 'fname', name: 'fname'},
            {data: 'sname', name: 'sname'},
            {data: 'flast', name: 'flast'},
            {data: 'slast', name: 'slast'},
            {data: 'charter', name: 'charter'},
            {data: 'phone', name: 'phone'}
        ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement('input');
                    $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? val : '', true, false).draw();
                            });
                });
            }
        });
    });
    </script>

@endpush