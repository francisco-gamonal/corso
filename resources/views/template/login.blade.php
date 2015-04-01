<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Pagina inicio">
        <meta name="author" content="Sistemas Amigables S. de R.L. de C.V.">
        <title>El Corso</title>
        {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}>
        @yield('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}} ">
    </head>
    <body style="background: url('../img/back.png');">
        <main class="row">
            @yield('content')
        </main>
        <footer>
            @include('template.partials.footer')
        </footer>
        {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
        {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
        @yield('scripts')
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>