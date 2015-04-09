<table id="table_dataProduct" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Tipo Cliente</th>
            <th>Estado</th>
            <th>Observación</th>
            <th>Comentario</th>
            <th>Mensajero</th>
            <th>Ciudad</th>
        </tr>
    </thead>
<tbody>
    @foreach($dataClaro as $data)
        @foreach($data as $product)
        <tr>
            <td>{{$product->codigo}}</td>
            <td>{{$product->name_cliente}}</td>
            <td>{{$product->tipo_cliente}}</td>
            <td>{{$product->observations->status->name}}</td>
            <td>{{$product->observations->name}}</td>
            <td>{{$product->comentario}}</td>
            <td>{{$product->staffs->fname}} {{$product->staffs->flast}}</td>
            <td>{{$product->citys->name}}</td>
        <tr>
        @endforeach
    @endforeach
<tbody>
<script type="text/javascript">
    //$('#table_dataProduct').dataTable();
</script>