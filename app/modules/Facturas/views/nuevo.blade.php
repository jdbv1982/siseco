<h2>Nueva Factura</h2>

<p><strong>Estimacion: </strong>{{ $estimacion->nombre }} {{ $estimacion->numestimacion }}</p>
<p><strong>Nombre de la Obra: </strong>{{ $estimacion->nombreobra_ori }}</p>

{{ Form::open(array('url'=> array('facturas/nuevo'),'method'=>'POST')) }}

<input type="hidden" id="idestimacion" name="idestimacion" value="{{ $id }}">
<div class="row">
	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('folio','Folio') }}
		<div class="controls">
			{{ Form::text('folio',null,array('class'=>'form-control','required')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('fechaexp','Fecha') }}
		<div class="controls">
			{{ Form::text('fechaexp',null,array('class'=>'form-control','required')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('subtotal','Subtotal') }}
		<div class="controls">
			{{ Form::text('subtotal',null,array('class'=>'form-control','required')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('amtzxant','Amortizacion por Anticipo') }}
		<div class="controls">
			{{ Form::text('amtzxant',null,array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('liquido','Liquido') }}
		<div class="controls">
			{{ Form::text('liquido',null,array('class'=>'form-control','required')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('finieje','Fecha de Inicio') }}
		<div class="controls">
			{{ Form::text('finieje',$estimacion->finicio_est,array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('ffineje','Fecha de Termino') }}
		<div class="controls">
			{{ Form::text('ffineje',$estimacion->ftermino_est,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('observaciones','Observaciónes') }}
		<div class="controls">
			{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>



</div>
	<br>
	<div class="form-group">
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('estimaciones/listado') }}" class="btn btn-primary">Cancelar</a>
	</div>


{{ Form::close() }}
