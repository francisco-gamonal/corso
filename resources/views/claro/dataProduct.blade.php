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
                    <td>{{mb_convert_case($product->name_cliente, MB_CASE_TITLE, 'utf-8')}}</td>
                    <td>{{mb_convert_case($product->tipo_cliente, MB_CASE_TITLE, 'utf-8')}}</td>
                    @if($product->observaciones_id)
                        @foreach($observations as $observation)
                            @if($observation->id == $product->observaciones_id)
                                @foreach($status as $statu)
                                    @if($statu->id == $observation->estados_id)
                                        <td>{{mb_convert_case($statu->name, MB_CASE_TITLE, 'utf-8')}}</td>
                                    @endif
                                @endforeach
                                <td>{{mb_convert_case($observation->name, MB_CASE_TITLE, 'utf-8')}}</td>
                            @endif
                        @endforeach
                    @else
                        <td></td>
                    @endif
                    <td>{{$product->comentario}}</td>
                    @if($product->empleados_id)
                        @foreach($staffs as $employe)
                            @if($employe->id == $product->empleados_id)
                                <td>{{mb_convert_case($employe->fname, MB_CASE_TITLE, 'utf-8')}}</td>
                            @endif
                        @endforeach
                    @else
                        <td></td>
                    @endif
                    @foreach($cities as $city)
                        @if($city->id == $product->ciudades_id)
                            <td>{{mb_convert_case($city->name, MB_CASE_TITLE, 'utf-8')}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    dataTable('#table_dataProduct', 'productos claro');
</script>