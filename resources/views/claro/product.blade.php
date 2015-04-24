@extends('template.main')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lib/daterangepicker-bs3-test.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.min.css') }}">
@endsection

@section('content')
	@if(!$producto->isEmpty())
		@foreach($producto as $product)
		<div class="product" data-url="product">
			<h2 class="text-center">Claro - {{$product->name}}</h2>
			<div class="text-center">
				<label class="text-center">Rango de Fechas</label>
				<div class="form-group">
					<div class="input-group col-sm-4 col-sm-offset-4">
						<input id="startDate" type="hidden" value="{{ $inicioRecord }}">
						<input id="endDate" type="hidden" value="{{ $finalRecord }}">
						<input id="idProduct" type="hidden" value="{{ $product->id }}">
						<input id="urlExcel" type="hidden" value="{{ route('descarga-productos', $product->id) }}">
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
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/lib/moment-test.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/daterangepicker-test.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bower_components/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.min.js') }}"></script>
@endsection