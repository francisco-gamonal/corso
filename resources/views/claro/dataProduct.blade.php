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
        @foreach($dataClaro as $dataProduct)
            @foreach($dataProduct as $product)
                <tr>
                    <th>{{$product->codigo}}</th>
                    <th>{{$product->name_cliente}}</th>
                    <th>{{$product->tipo_cliente}}</th>
                    <th>Estado</th>
                    <th>Observación</th>
                    <th>{{$product->comentario}}</th>
                    <th>Mensajero</th>
                    <th>Ciudad</th>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $('#table_dataProduct').dataTable();
</script>