<h3>Importar Clc's</h3>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('archivo_clc','Seleccione Archivo') }}
			<div class="controls">
				{{ Form::file('archivo_clc', array('class'=>'form-control','id'=>'archivo_clc')) }}

			</div>
		</div>
		<div class="form-group">
			<a href="#" class="btn btn-primary" id="detalleclc">Aceptar</a>
			<a href="{{ URL::to('clc/guardar') }}" class="btn btn-primary">Cancelar</a>
		</div>
	</div>

</div>

<div class="row  col-sm-3">
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    0%
  </div>
</div>

</div>
