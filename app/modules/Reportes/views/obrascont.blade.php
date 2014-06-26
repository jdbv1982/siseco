<h4>Reporte de Obras Contratadas</h4>

{{ Form::open(array('url'=>'reportes/obrascontratadas','class'=>'form-inline')) }}
<input type="hidden" id="_nivel" value="0">
<div class="row">
	@include('filtros.fuente_partial')
	@include('filtros.region_partial')
	@include('filtros.distrito_partial')
	@include('filtros.municipio_partial')
	@include('filtros.localidad_partial')
	@include('filtros.submit_partial')
</div>

{{ Form::close() }}

