<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Pagina inicio">
        <meta name="author" content="Sistemas Amigables S. de R.L. de C.V.">
        <title>El Corso</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}} ">
        @yield('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}} ">
    </head>
    <body style="background: url('../img/back.png');">
        <main class="row">
            @yield('content')
        </main>
        @include('template.partials.footer')
        <script type="text/javascript" src="{{ asset('node_modules/datatables/node_modules/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        @yield('scripts')
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>