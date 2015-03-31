@extends('template.main')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lib/daterangepicker-bs3.css') }}">
@endsection

@section('content')
	@if(!$producto->isEmpty())
		@foreach($producto as $product)
		<div class="product">
			<h2 class="text-center">Claro - {{$product->name}}</h2>
			<div class="text-center">
				<label class="text-center">Rango de Fechas</label>
				<div class="form-group">
					<div class="input-group col-sm-4 col-sm-offset-4">
						<input id="startDate" type="hidden" value="{{ str_pad($inicioRecord->mes, 2, '0', STR_PAD_LEFT).'/'.$inicioRecord->year }}">
						<input id="endDate" type="hidden" value="{{ str_pad($finalRecord->mes, 2, '0', STR_PAD_LEFT).'/'.$finalRecord->year }}">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="txtDate" type="text" class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="data_product">
			
		</div>
		@endforeach
	@else
		No existe
	@endif
        
        <?php //echo json_encode($dataClaro);  ?>
        <table class="table table-striped">
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
        <tr>  
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        <tr>
         
     <tbody>        
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/lib/moment.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/daterangepicker.js') }}"></script>
@endsection