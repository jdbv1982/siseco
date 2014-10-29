<h4>Reporte de Obras Autorizadas</h4>

{{ Form::open(array('url'=>'graficas/captura','class'=>'form-inline','target'=>'_blank')) }}
<div class="row">
	@include('filtros.años_partial')
	@include('filtros.submit_partial')
</div>
{{ Form::close() }}
