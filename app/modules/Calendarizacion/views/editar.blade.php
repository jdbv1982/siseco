<h1>Editar Calendarización</h1>
<a href="#" id="sumarcale" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></a>
@include('layouts/errores')
{{ Form::model($calen, array('url'=> array('calendarizacion/editar',$calen->id),'method'=>'POST',)) }}
{{ Form::hidden('idobra', $calen->idobra) }}
<div class="row">
	<div class="form-group col-xs-12 col-sm-6">
		{{ Form::label('Nombre:') }}
		<div class="controls">
			{{ Form::text('conceptocal',$calen->conceptocal,array('class'=>'form-control','required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-3">
		{{ Form::label('Porcentaje:') }}
		<div class="controls">
			{{ Form::text('porcentaje',$calen->porcentaje,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-3">
		{{ Form::label('Total:') }}
		<div class="controls">
			{{ Form::text('totalcal',$calen->totalcal,array('class'=>'form-control', 'id'=>'sumacalen')) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Enero:') }}
		<div class="controls">
			{{ Form::text('enero',$calen->enero,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Febrero:') }}
		<div class="controls">
			{{ Form::text('febrero',$calen->febrero,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Marzo:') }}
		<div class="controls">
			{{ Form::text('marzo',$calen->marzo,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Abril:') }}
		<div class="controls">
			{{ Form::text('abril',$calen->abril,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Mayo:') }}
		<div class="controls">
			{{ Form::text('mayo',$calen->mayo,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Junio:') }}
		<div class="controls">
			{{ Form::text('junio',$calen->junio,array('class'=>'form-control mes')) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Julio:') }}
		<div class="controls">
			{{ Form::text('julio',$calen->julio,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Agosto:') }}
		<div class="controls">
			{{ Form::text('agosto',$calen->agosto,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Septiembre:') }}
		<div class="controls">
			{{ Form::text('septiembre',$calen->septiembre,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Octubre:') }}
		<div class="controls">
			{{ Form::text('octubre',$calen->octubre,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Noviembre:') }}
		<div class="controls">
			{{ Form::text('noviembre',$calen->noviembre,array('class'=>'form-control mes')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-2">
		{{ Form::label('Diviembre:') }}
		<div class="controls">
			{{ Form::text('diciembre',$calen->diciembre,array('class'=>'form-control mes')) }}
		</div>
	</div>
</div>


<br>
<div class="form-group">
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	<a href="{{ URL::to('calendarizacion/listado') }}" class="btn btn-primary">Cancelar</a>
</div>
{{ Form::close() }}

