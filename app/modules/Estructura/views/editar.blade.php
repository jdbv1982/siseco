<h1>Editar Estructura Financiera</h1>
@include('layouts/errores')
{{ Form::model($estructura, array('url'=> array('estructura/editar',$estructura->id),'method'=>'POST',)) }}
{{ Form::hidden('idobra', $estructura->idobra) }}
<div class="row">
	<div class="form-group col-xs-12 col-sm-4">
		{{ Form::label('Concepto:') }}
		<div class="controls">
			{{ Form::text('concepto',$estructura->concepto,array('class'=>'form-control','required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('Inversion Federal:') }}
		<div class="controls">
			{{ Form::text('invfederal',$estructura->invfederal,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('Inversion Estatal:') }}
		<div class="controls">
			{{ Form::text('investatal',$estructura->investatal,array('class'=>'form-control', 'id'=>'sumacalen')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('Inversion Municipal:') }}
		<div class="controls">
			{{ Form::text('invmunicipal',$estructura->invmunicipal,array('class'=>'form-control', 'id'=>'sumacalen')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('Inv. Participantes:') }}
		<div class="controls">
			{{ Form::text('invparticipantes',$estructura->invparticipantes,array('class'=>'form-control', 'id'=>'sumacalen')) }}
		</div>
	</div>
</div>
<br>
<div class="form-group">
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	<a href="{{ URL::to('calendarizacion/listado') }}" class="btn btn-primary">Cancelar</a>
</div>
{{ Form::close() }}
