
<div class="well col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">

	<h2 class="text-center">Agregar Contratista</h2>

	{{ Form::open(array('url'=>'contratistas/nuevo','method'=>'POST','class'=>'form-horizontal')) }}

	@include('layouts/errores')	

	
<br>
<div class="row">
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('numero','Numero') }}
		<div class="controls">
			{{ Form::text('numero',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('rfc','RFC') }}
		<div class="controls">
			{{ Form::text('rfc',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('razsoc','Razon Social') }}
		<div class="controls">
			{{ Form::text('razsoc',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('domicilio','Domicilio') }}
		<div class="controls">
			{{ Form::text('domicilio',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('repleg','Representante Legal') }}
		<div class="controls">
			{{ Form::text('repleg',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('telefonos','Telefonos') }}
		<div class="controls">
			{{ Form::text('telefonos',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('correo','Correo Electronico') }}
		<div class="controls">
			{{ Form::text('correo',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<br>
	<div class="input-group col-xs-8 col-xs-offset-2">
		{{ Form::label('celular','Tel. Celular') }}
		<div class="controls">
			{{ Form::text('celular',null,array('class'=>'form-control')) }}
		</div>
	</div>
</div>	
	<br>
	<div class="form-group ">
		{{ Form::submit('Guardar',array('class'=>'btn btn-success col-xs-4 col-xs-offset-1')) }}
		<a href="{{ URL::to('usuarios/listado') }}" class="btn btn-warning col-xs-4 col-xs-offset-1">Cancelar</a>
	</div>
	{{ Form::close() }}
</div>
