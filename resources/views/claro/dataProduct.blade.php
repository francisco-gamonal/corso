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
                    <td>{{$product->codigo}}</td>
                    <td>{{$product->name_cliente}}</td>
                    <td>{{$product->tipo_cliente}}</td>
                    <td>Estado</td>
                    <td>Observación</td>
                    <td>{{$product->comentario}}</td>
                    <td>Mensajero</td>
                    <td>Ciudades</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $('#table_dataProduct').dataTable();
</script>