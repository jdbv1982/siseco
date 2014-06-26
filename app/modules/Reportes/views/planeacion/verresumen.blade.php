<h4>Resumen de Obras</h4>

{{ Form::open(array('url'=>'reportes/resumen_planeacion_','class'=>'form-inline')) }}
<div class="row">
	@include('radiobtn.fuente_partial')
	@include('radiobtn.region_partial')
	@include('radiobtn.distrito_partial')
	@include('radiobtn.municipio_partial')
	@include('radiobtn.localidad_partial')
	@include('filtros.submit_partial')
</div>

{{ Form::close() }}
