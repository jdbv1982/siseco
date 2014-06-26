<h2>Editar Oficio</h2>

{{ Form::model($oficio, array('url'=> array('oficios/editar',$oficio->id),'method'=>'POST','class'=>'target')) }}

@include('layouts/errores')
{{ Form::text('id',$oficio->id,array("class"=>'hidden')) }}
{{ Form::text('idobra',$oficio->idobra,array("class"=>'hidden')) }}
<div class="row">
	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('nombreoficio','Nombre Del Oficio') }}
		<div class="controls">
			{{ Form::text('nombreoficio',null,array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('numerooficio','Numero de Oficio') }}
		<div class="controls">
			{{ Form::text('numerooficio',null,array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('fechaoficio','Fecha') }}
		<div class="controls">
			{{ Form::text('fechaoficio',null,array('class'=>'form-control fecha')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('fecharecibido','Fecha') }}
		<div class="controls">
			{{ Form::text('fecharecibido',null,array('class'=>'form-control fecha')) }}
		</div>
	</div>
</div>
<br>

	<div class="form-group">
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('oficios/listado') }}" class="btn btn-primary">Cancelar</a>
	</div>
{{ Form::close() }}
