@extends('template.main')

@section('content')
	<h3 class="text-center">Bienvenido {{ Auth::user()->nameComplete() }}</h3>
@endsection