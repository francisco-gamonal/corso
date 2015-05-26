@extends('template.main')

@section('head')
<meta name="description" content="Atlantida - Importar Estado de Cuenta" />
<meta name="author" content="Sistemas Amigables" />
    @section('tittle')
        Atlantida -  Importar Estado de Cuenta
    @endsection
@endsection

@section('styles')
    {!! Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('content')
    <section>
        <h2 class="text-center" style="margin-top:0;">
            <figure>
                <img src="{{ asset('img/logosclientes/logo-atlantida.png') }}" alt="">
            </figure>
            <p>
                <span class="glyphicon glyphicon-list-alt"></span> 
                <span class="product" data-url="state">Importar Estado de Cuenta</span>
            </p>
        </h2>
    </section>
    <section>
        <form id="formState" action="{{route('save-estado-de-cuenta')}}">
            <div class="col-sm-6 col-md-6">
                <div class="form-corso">
                    <label for="dateAtlantida">Escoger Fecha</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input name="productos_id" type="hidden" value="{{ $atlantida }}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input id="dateAtlantida" name="dateAtlantida" type="text" class="form-control">
                        </div>
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
            <div class="col-sm-12">
                <div class="text-center">
                    <input class="btn btn-success" type="submit" value="Importar Estado de Cuenta">
                </div>
            </div>
        </form>
    </section>
@endsection
@section('scripts')
    {!! Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') !!}
    <script>
        var date_enabled = <?= json_encode($cortes); ?>;
        $("#dateAtlantida").datepicker({
            format: "dd/mm/yyyy",
            startDate: "{{ $periodo['inicio'] }}",
            endDate: "{{ $periodo['final'] }}",
            minViewMode: 0,
            language: "es",
            orientation: "auto",
            autoclose: true,
            beforeShowDay: function(date){
                var formattedDate = $.fn.datepicker.DPGlobal.formatDate(date, 'dd/mm/yyyy', 'es');
                if($.inArray(formattedDate.toString(), date_enabled) == -1){
                    return {
                       enabled : false
                    };
                }
                return;
            }
        });

        $('#formState').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('save-estado-de-cuenta')}}",
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