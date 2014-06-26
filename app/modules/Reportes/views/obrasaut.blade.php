<h4>Reporte de Obras Autorizadas</h4>

{{ Form::open(array('url'=>'reportes/verobrasaut','class'=>'form-inline')) }}
<input type="hidden" id="_nivel" value="0">
<div class="row">
	@include('filtros.region_partial')
	@include('filtros.distrito_partial')
	@include('filtros.municipio_partial')
	@include('filtros.localidad_partial')
	@include('filtros.submit_partial')
</div>
{{ Form::close() }}

