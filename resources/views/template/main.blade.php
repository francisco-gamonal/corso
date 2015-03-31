<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/logo-claro.png" />
        <title>@yield('tittle')</title>
        @yield('head')
        {{ Html::style('node_modules/bootstrap/dist/css/bootstrap.min.css') }}
        @yield('styles')
        {{ Html::style('css/main.css') }}
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
        @include('template.partials.footer')
        {{ Html::script('node_modules/datatables/node_modules/jquery/dist/jquery.min.js') }}
        {{ Html::script('node_modules/bootstrap/dist/js/bootstrap.min.js') }}
        @yield('scripts')
        {{ Html::script('js/main.js') }}
    </body>
</html>