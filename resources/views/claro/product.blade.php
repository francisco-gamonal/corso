@extends('template.main')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/lib/daterangepicker-bs3.css') }}">
@endsection

@section('content')
	@if(!$producto->isEmpty())
		@foreach($producto as $product)
		<div class="product">
			<h2 class="text-center">Claro - {{$product->name}}</h2>
			<label class="col-sm-2" style="line-height:2.5;text-align:right;">Rango de Fecha</label>
			<div class="form-group col-sm-3">
				<div class="input-group rdate">
					<input id="startDate" type="hidden" value="{{ str_pad($inicioRecord->mes, 2, '0', STR_PAD_LEFT).'/'.$inicioRecord->year }}">
					<input id="endDate" type="hidden" value="{{ str_pad($finalRecord->mes, 2, '0', STR_PAD_LEFT).'/'.$finalRecord->year }}">
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="txtDate" type="text" class="form-control">
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
	<script type="text/javascript" src="{{ asset('js/lib/moment.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/lib/daterangepicker.js') }}"></script>
@endsection