<div class="well col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">

<h2>Editar Usuario</h2>

{{ Form::model($usuario, array('url'=> array('usuarios/editar',$usuario->id),'method'=>'POST','class'=>'form-horizontal')) }}

	@include('layouts/errores')	

	<div class="row">
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('nombre','Nombre Completo') }}
		<div class="controls">
			{{ Form::text('nombre',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('email','Correo Electronico') }}
		<div class="controls">
			{{ Form::text('email',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('password','Contraseña') }}
		<div class="controls">
			{{ Form::password('password',array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('idPerfil','Perfil de Usuario') }}
		<div class="controls">
			{{ Form::select('idPerfil', $perfiles,null, array('class' => 'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('status', 'Activo')}}
		{{ Form::checkbox('status',1)}}
	</div>
</div>	
	<br>
	<div class="form-group ">
		{{ Form::submit('Guardar',array('class'=>'btn btn-success col-xs-4 col-xs-offset-1')) }}
		<a href="{{ URL::to('usuarios/listado') }}" class="btn btn-warning col-xs-4 col-xs-offset-1">Cancelar</a>
	</div>
{{ Form::close() }}

</div>
