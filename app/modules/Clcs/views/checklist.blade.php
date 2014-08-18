<h2>Checklist del Expediente</h2>

<div class="row">
<legend>Datos Generales</legend>
<div class="form-group col-sm-6">
	<p>MODALIDAD DE EJECUCION: <strong>{{$obra->ejecucion}}</strong></p>
</div>
<div class="form-group col-sm-6">
	<p>RESIDENCIA REGIONAL DE CAO: <strong>{{$obra->residencia}}</strong></p>
</div>
<div class="form-group col-sm-12">
	<p>NOMBRE DE LA OBRA: <strong>{{$obra->nombreobra}}</strong></p>
</div>
<div class="form-group col-sm-12">
	<p>CONTRATISTA: <strong>{{$obra->contratista}}</strong></p>
</div>
<div class="form-group col-sm-6">
	<p>CONTRATO: <strong>{{$obra->contrato}}</strong></p>
</div>
<div class="form-group col-sm-6">
	<p>FECHA: <strong>{{$obra->fecha}}</strong></p>
</div>

<div class="form-group col-sm-6">
	<p>ESTIMACION No: <strong>{{isset($estimacion->nombre) ? $estimacion->nombre : ''}}</strong></p>
</div>
<div class="form-group col-sm-6">
	<p>IMPORTE: <strong>{{isset($estimacion->importe) ? $estimacion->importe : ''}}</strong></p>
</div>
<div class="form-group col-sm-12">
	<p>PERIODO DE EJECUCION: <strong>{{isset($estimacion->periodo) ? $estimacion->periodo : ''}}</strong></p>
</div>

</div>

<div class="row">
	@if($obra->idmodalidad == 1)
		@include('clc/exp_contrato')
	@else
		@include('clc/exp_administracion')
	@endif
</div>
