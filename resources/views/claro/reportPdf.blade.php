<h2 style="margin-top:-1em; text-align:center;">Reporte de Entregas</h2>
<table id="table_dataProduct" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr style="font-size: 14px">
            <th>Código</th>
            <th>Tipo Cliente</th>
            <th>Teléfono</th>
            <th>Nombre Cliente</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Observación</th>
            <th>Comentario</th>
            <th>Fecha Entrega</th>
            <th>Fecha Recibido</th>
            <th>Monto</th>
            <th>Dirección</th>
            <th>Comentario Ciudad</th>
            <th>Empleados</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataCompanies as $dataCompanie)
        <tr>
            <td>{{$dataCompanie->codigo}}</td>
            <td>{{$dataCompanie->tipo_cliente}}</td>
            <td>{{$dataCompanie->name_cliente}}</td>
            @if(empty($dataCompanie->ciudades_id))
                <td>-</td>
            @else
                <td>{{$dataCompanie->ciudades_id}}</td>
            @endif
            @if(empty($dataCompanie->observaciones_id))
                <td>-</td>
                <td>-</td>
            @else
                <td>{{$dataCompanie->observations->status->name}}</td>
                <td>{{$dataCompanie->observations->name}}</td>
            @endif
            <td>{{$dataCompanie->comentario}}</td>
            <td>{{$dataCompanie->direccion}}</td>
            @if(empty($dataCompanie->empleados_id))
                <td>-</td>
            @else
                <td>{{$dataCompanie->empleados_id}}</td>
            @endif
            <td>{{$dataCompanie->empleados_id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>