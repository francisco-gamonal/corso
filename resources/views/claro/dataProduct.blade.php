<table id="table_dataProduct" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
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
    <?php $i=1; ?>
    @foreach($dataClaro as $data)
        @foreach($data as $product)
        <tr>  
            <td>{{ $i }}</td>
            <td> Codigo</td>
            <td> Nombre</td>
            <td> tipo_cliente</td>
            <td> Estado</td>
            <td> Observación</td>
            <td> Comentario</td>
            <td> Mensajero</td>
            <td> Ciudad</td>
        <tr>
        <?php $i++; ?>
        @endforeach
    @endforeach
<tbody>
<script type="text/javascript">
    $('#table_dataProduct').dataTable();
</script>