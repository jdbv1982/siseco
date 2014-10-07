<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/inicio') }}">.:: SISECO ::.</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    @if(Auth::check())
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @if(Auth::user()->verificaPermiso(Auth::user()->id, 31) == 'true')
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('usuarios/listado') }}">Usuarios</a></li>
                </ul>
            </li>

        </ul>
        @endif
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Obras <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->verificaPermiso(Auth::user()->id, 7) == 'true')
                        <li><a href="{{ URL::to('planeacion/nuevo') }}">Nueva Obra</a></li>
                    @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 8) == 'true')
                            <li><a href="{{ URL::to('obras/listado/1') }}">CAPUFE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 9) == 'true')
                            <li><a href="{{ URL::to('obras/listado/2') }}">FAFEF</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 10) == 'true')
                            <li><a href="{{ URL::to('obras/listado/3') }}">FISE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 11) == 'true')
                            <li><a href="{{ URL::to('obras/listado/4') }}">FONDEN</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 12) == 'true')
                            <li><a href="{{ URL::to('obras/listado/5') }}">FONREGION</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 13) == 'true')
                            <li><a href="{{ URL::to('obras/listado/6') }}">PNE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 14) == 'true')
                            <li><a href="{{ URL::to('obras/listado/7') }}">RG23</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 15) == 'true')
                            <li><a href="{{ URL::to('obras/listado/8') }}">PROII</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 43) == 'true')
                            <li><a href="{{ URL::to('obras/listado/9') }}">PIBAI</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 58) == 'true')
                            <li><a href="{{ URL::to('obras/listado/10') }}">SCT</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 37) == 'true')
                            <li><a href="{{ URL::to('obras/listado') }}">Todas</a></li>
                        @endif

                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogos <b class="caret"></b></a>
                <ul class="dropdown-menu">
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 4) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
                    <li><a href="{{ URL::to('contratistas/listado') }}">Contratistas</a></li>
                    <li><a href="{{ URL::to('graficas/graficas') }}">Graficas</a></li>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 19) == 'true')
                    <li><a href="{{ URL::to('oficios/listado') }}">Oficios</a></li>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 20) == 'true')
                    <li><a href="{{ URL::to('estimaciones/listado') }}">Estimaciones</a></li>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 36) == 'true')
                    <li><a href="{{ URL::to('calendarizacion/listado') }}">Calendarización</a></li>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 42) == 'true')
                    <li><a href="{{ URL::to('estructura/listado') }}">Estructura</a></li>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 48) == 'true')
                    <li><a href="{{ URL::to('facturas/listado') }}">Facturas</a></li>
                @endif
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li>
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 30) == 'true')
                    <a href="{{ URL::to('tablero/opciones') }}">Tablero de Control</a>
                @endif
            </li>
        </ul>

         @if(Auth::user()->verificaPermiso(Auth::user()->id, 46) == 'true')
         <ul class="nav navbar-nav">
            <li>

            </li>
        </ul>
            <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listado de Clcs<b class="caret"></b></a>
                <ul class="dropdown-menu">
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 48) == 'true')
                            <li><a href="{{ URL::to('clc/listado/1') }}">CAPUFE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 49) == 'true')
                            <li><a href="{{ URL::to('clc/listado/2') }}">FAFEF</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 50) == 'true')
                            <li><a href="{{ URL::to('clc/listado/3') }}">FISE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 51) == 'true')
                            <li><a href="{{ URL::to('clc/listado/4') }}">FONDEN</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 52) == 'true')
                            <li><a href="{{ URL::to('clc/listado/5') }}">FONREGION</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 53) == 'true')
                            <li><a href="{{ URL::to('clc/listado/6') }}">PNE</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 54) == 'true')
                            <li><a href="{{ URL::to('clc/listado/7') }}">RG23</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 55) == 'true')
                            <li><a href="{{ URL::to('clc/listado/8') }}">PROII</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 56) == 'true')
                            <li><a href="{{ URL::to('clc/listado/9') }}">PIBAI</a></li>
                        @endif
                        @if(Auth::user()->verificaPermiso(Auth::user()->id, 57) == 'true')
                            <li><a href="{{ URL::to('clc/listado/10') }}">SCT</a></li>
                        @endif
                </ul>
            </li>

        </ul>



         @endif

         @if(Auth::user()->verificaPermiso(Auth::user()->id, 47) == 'true')
         <ul class="nav navbar-nav">
            <li>
                    <a href="{{ URL::to('caja/listado') }}">Ordenes de Pago</a>
            </li>
        </ul>
         @endif

        @if(Auth::user()->verificaPermiso(Auth::user()->id, 44) == 'true')
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilerias <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->verificaPermiso(Auth::user()->id, 45) == 'true')
                        <li><a href="{{ URL::to('clc/importar') }}">Importar Clc's</a></li>
                    @endif
                </ul>
            </li>

        </ul>
        @endif

        <ul class="nav navbar-nav navbar-right">
            <li>
                @if(Auth::check())
                <a href="#" id="vernotifi" class="notificacion_bell" title="Ver notificaciones">
                    <span class="count"> {{ Auth::user()->getNumNotificaciones( Auth::user()->id) }}  </span>
                </a>@endif
            </li>
            <li>
                @if(Auth::check())
                <a href="#" id="get-mensajes" class="glyphicon glyphicon-comment" title="Ver mensajes">
                    <span class="count"> {{ Auth::user()->getNumMensajes( Auth::user()->id) }}  </span>
                </a>@endif
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nombre }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('auth/cambiar', Auth::user()->id ) }}">Cambiar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('auth/logout') }}">Salir</a></li>
                </ul>
            </li>
        </ul>
    </div>
    @endif

</nav>

@if(Auth::check())
<div class="container-list" id="contnotif">
    @foreach (Auth::user()->getNotificaciones( Auth::user()->id) as $notificacion)
    <div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="{{ URL::to('notificaciones/vista/')}}/{{$notificacion->id}}">{{ $notificacion->titulo }}</a></h3>
            </div>
            <div class="panel-body">
                {{ $notificacion->mensaje }}
            </div>
        </div>
    </div>
    @endforeach
    <div class="text-center">
        <a class="blanco" href="{{ URL::to('notificaciones/todas')}}/{{Auth::user()->id}}"><span>Ver Todas</span></a>
    </div>
</div>
@endif

@if(Auth::check())
<div class="container-list" id="messages-list">
    @foreach (Auth::user()->getMensajes( Auth::user()->id) as $mensaje)
    <div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title titulo"><a href="{{ URL::to('notificaciones/vista/')}}/{{$mensaje->mensaje_id}}">Enviado por:{{ $mensaje->nombre }}</a></h3>
            </div>
            <div class="panel-body mensaje">
                {{ $mensaje->mensaje }}
            </div>
        </div>
    </div>
    @endforeach
    <div class="text-center">
        <a class="blanco" href="#"><span class="glyphicon glyphicon-plus" id="new-message"></span></a>
        <a class="blanco" href="{{ URL::to('notificaciones/todas')}}/{{Auth::user()->id}}"><span class="glyphicon glyphicon-list-alt"></span></a>
    </div>
</div>
@endif


@include('layouts.mensajes')
