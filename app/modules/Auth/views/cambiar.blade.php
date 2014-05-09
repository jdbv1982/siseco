<h1>Cambiar Contraseña</h1>

{{ Form::open(array('url'=> array('auth/cambiar', $usuario->id), 'method'=>'POST','class'=>'form-horizontal')) }}
<div class="col-xs-6 col-sm-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('nuevopass', 'Nueva Contraseña') }}
		<div class="controls">
			{{ Form::password('nuevopass',array('class'=>'form-control col-xs-6 col-sm-6')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('/inicio') }}" class="btn btn-primary">Cancelar</a>
	</div>
</div>

{{ Form::close() }}