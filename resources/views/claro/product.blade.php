@extends('template.main')

@section('content')
	@if(!$producto->isEmpty())
	<div class="product">
		<form class="navbar-form form-inline" role="form">
			<input type="hidden" id="startDate" value="1/2014">
			<input type="hidden" id="endDate" value="1/2015">
			<input type="hidden" id="year" value="">
			<input type="hidden" id="month" value="" page="report">
			<input type="hidden" id="eyear" value="">
			<input type="hidden" id="emonth" value="">
			<label class="col-sm-1" style="line-height:2.5;text-align:right;">Fecha</label>
			<div id="txtDate" class="form-group col-sm-3">
				<div class="input-group rdate">
					<input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			
			
		</form>		
	</div>
	<div class="data_product">
		
	</div>
	@else
		No existe
	@endif
@endsection