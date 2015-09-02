@extends('template.main')

@section('head')
<meta name="description" content="Claro - Subir Estado de Cuenta" />
<meta name="author" content="Sistemas Amigables" />
    @section('tittle')
        Claro -  Subir Estado de Cuenta
    @endsection
@endsection

@section('styles')
    {!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('content')
    <section>
        <h2 class="text-center" style="margin-top:0;">
            <figure>
                <img src="{{ asset('img/logosclientes/logo-claro-2.png') }}" alt="">
            </figure>
            <p>
                <span class="glyphicon glyphicon-list-alt"></span> 
                <span class="product" data-url="state">Importar Ciclo</span>
            </p>
        </h2>
    </section>
    <section>
        <form id="formState">
            <div class="col-sm-6 col-md-6">
                <div class="form-corso">
                    <label for="datePicker">Escoger Fecha</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input id="startDate" type="hidden" value="{{ $periodo[0] }}">
                            <input id="endDate" type="hidden" value="{{ $periodo[1] }}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input id="datePicker" name="datePicker" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-corso">
                    <label for="productClaro">Escoger Producto</label>
                    <div class="form-group">
                        <select class="form-control" name="productClaro" id="productClaro">
                            @foreach($claro as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div id="file-state" class="form-corso">
                    <label>Escoger Archivo</label>
                    <input name="excel" style="position:fixed; margin-left: -9999px;" type="file">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-folder-open"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control" disabled="true">
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top:1em;">
                <div class="text-center">
                    <input class="btn btn-success" type="submit" value="Subir Estado de Cuenta">
                </div>
            </div>
        </form>
    </section>
@endsection
@section('scripts')
    {!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker-rc.js') !!}
    {!! Html::script('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') !!}
    <script>
        $('#formState').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('save-ciclo')}}",
                type: 'POST',
                cache: false,
                data: new FormData($('#formState')[0]),
                processData: false,
                contentType: false,
                beforeSend: function(){
                    loadingUI('Registrando Estado de Cuenta');
                },
                error:function(){
                    $.unblockUI();
                    bootbox.alert("<p class='red'>No se pueden grabar los datos.</p>")
                }
            }).done(function(response){
                messageAjax(response);
            });
        });
    </script>
@endsection