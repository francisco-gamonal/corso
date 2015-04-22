<figure>
    <img src="{{asset('img/logo-corso.png')}}">
</figure>
<div class="menu-cliente" id="">
    @if(Auth::user()->type_users_id=="1")
    <div class="menu-tittle">| Clientes -</div>
        <ul class="nav">
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Banco Occidente<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Estado Cuenta') }}</a></li>
                    <li><a>{{ Html::link('#', 'Cheques Devueltos') }}</a></li>
                </ul>
            </li>           
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Banco Continental<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Estado Cuenta de Cheques') }}</a></li>
                    <li><a>{{ Html::link('#', 'Estados de Cuenta Tarjetas') }}</a></li>
                    <li><a>{{ Html::link('#', 'Notas de debito') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Banco Atlantidad<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Estados de Cuenta') }}</a></li>
                    <li><a>{{ Html::link('#', 'Tarjetas de Credito') }}</a></li>
                </ul>
            </li>          
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Editorial Hablemos Claro<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Revista Hablemos Claro') }}</a></li>
                    <li><a>{{ Html::link('#', 'Revista AS Deportiva') }}</a></li>
                    <li><a>{{ Html::link('#', 'Revista Cromos') }}</a></li>
                    <li><a>{{ Html::link('#', 'Revista Hablemos Claro Financiera') }}</a></li>
                    <li><a>{{ Html::link('#', 'Revista  Come To Honduras') }}</a></li>
                </ul>
            </li>          
            <li class="dropdown">   
                <a href="#" class="boton-cliente" data-toggle="dropdown">Banco Ficohsa<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Estados de Cuenta en Lempiras') }}</a></li>
                    <li><a>{{ Html::link('#', 'Estados de Cuenta en Dolares') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Alcance<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Agregar Usuario') }}</a></li>
                    <li><a>{{ Html::link('#', 'Ver Usuarios') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Columbus<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a>{{ Html::link('#', 'Estados de Cuenta') }}</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Claro<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('claro') }}">Administración</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-48') }}">Ciclo C-48</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-46-tv') }}">Ciclo C-46-TV</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-46-movil') }}">Ciclo C-46-MOVIL</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('lista-users') }}">Ver Usuarios</a></li>
                    <li><a  href="{{ route('create-users') }}">Registrar Usuario</a></li> 
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="boton-cliente" data-toggle="dropdown">Opciones&nbsp;<span class=" glyphicon glyphicon-cog"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href='{{ Route('ver-empleados') }}'>Empleados</a></li>
                    <li><a href='{{ Route('lista-observacion') }}'>Observaciones </a></li>
                    <li>{!! HTML::link('/auth/logout', 'Cerrar sesión') !!}</li>
                </ul>
            </li>
        </ul>
    @endif
	@if(Auth::user()->type_users_id=="4")
        <div class="menu-tittle">| Cliente - Claro</div>
        <ul class="nav">
              <li><a href="{{ route('claro') }}">Administración</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-48') }}">Ciclo C-48</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-46-tv') }}">Ciclo C-46-TV</a></li>
                    <li><a href="{{ route('producto_claro', 'ciclo-c-46-movil') }}">Ciclo C-46-MOVIL</a></li>
            <li class="dropdown">
               {!! HTML::link('/auth/logout', 'Cerrar sesión') !!}
            </li>
        </ul>
         @endif
</div><!-- /.navbar-collapse -->