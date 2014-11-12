<h1>Tablero de Control</h1>
<div class="row">
<div class="row col-xs-12 col-sm-4 col-sm-offset-0">
	<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes Excel</h3>
      </div>
      <div class="panel-body">
        	@if(Auth::user()->verificaPermiso(Auth::user()->id, 16) == 'true')
                <li><a class="reporte" href="{{ URL::to('reportes/obrasautorizadas') }}">Obras Autorizadas</a></li>
            @endif
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 17) == 'true')
                <li><a class="reporte" href="{{ URL::to('reportes/obrascontratadas') }}">Obras Contratadas</a></li>
            @endif
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 18) == 'true')
                <li><a class="reporte" href="{{ URL::to('reportes/resumen') }}">Resumen de Obras</a></li>
            @endif
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 18) == 'true')
                <li><a class="reporte" href="{{ URL::to('reportes/resumen_planeacion') }}">Resumen Planeacion</a></li>
            @endif
                <li><a href="{{ URL::to('reportes/informacion') }}">Información Completa</a></li>
      </div>
    </div>
</div>

<div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes</h3>
      </div>
      <div class="panel-body">
        En Construcción...
      </div>
    </div>
 </div>
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes Control</h3>
      </div>
      <div class="panel-body">
         @if(Auth::user()->verificaPermiso(Auth::user()->id, 18) == 'true')
                <li><a href="{{ URL::to('reportes/inf_anual_fuente') }}">Inversion anual por fuente</a></li>
            @endif
      </div>
    </div>
 </div>
 </div>
 <div class="row">
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes de Obras</h3>
      </div>
      <div class="panel-body">
        <li><a href="{{ URL::to('reportes/obras_afisico') }}">Obras con avance fisico</a></li>
        <li><a href="{{ URL::to('reportes/obras_estimacion') }}">Obras con estimaciones</a></li>
        <li><a href="{{ URL::to('reportes/obras_clcs') }}">Obras con Clcs</a></li>
      </div>
    </div>
 </div>
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Panel de filtros</h3>
      </div>
      <div id="filtros" class="panel-body">

      </div>
    </div>
 </div>
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes</h3>
      </div>
      <div class="panel-body">
        En Construcción...
      </div>
    </div>
 </div>
 </div>

 <div class="row">
<div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes Seguimiento</h3>
      </div>
      <div class="panel-body">
        @if(Auth::user()->verificaPermiso(Auth::user()->id, 16) == 'true')
                <li><a href="{{ URL::to('reportes/informacion') }}">Inversion por fuente y clasificacion</a></li>
            @endif
      </div>
    </div>
 </div>
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Reportes</h3>
      </div>
      <div class="panel-body">
        En Construcción...
      </div>
    </div>
 </div>
 <div class="row col-xs-12 col-sm-4 col-sm-offset-0">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Graficas</h3>
      </div>
      <div class="panel-body">
          <li><a class="link" href="{{ URL::to('graficas/barrasxfuente') }}" target="blank">Obras Contratadas por Fuente</a></li>
          <li><a class="reporte" href="{{ route('porcentaje-captura') }}" target="blank">Porcentaje de Captura</a></li>
      </div>
    </div>
 </div>
</div>
