<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="img/logo-claro.png" />
        <title>@yield('tittle')</title>
        @yield('head')
        {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
        @yield('styles')
        {!! Html::style('css/main.css') !!}
    </head>
    <body>
        <main class="row">
            <section class="nav-wrapper">
                @include('template.partials.menu')
            </section>
            <section class="content-wrapper">
                @yield('content')
            </section>
        </main>
       <!--  <footer>
            @include('template.partials.footer')
        </footer> -->
        {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
        {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
        @yield('scripts')
        {!! Html::script('js/main.js') !!}
    </body>
</html>