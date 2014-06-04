<div class="col-xs-10 col-xs-offset-1">
<h2>Editar Estimacion</h2>
<p><strong>Numero:</strong>{{$obra->numeroobra}}</p>
<p><strong>Nombre:</strong>{{$obra->nombreobra}}</p>

{{ Form::model($est, array('url'=> array('estimaciones/editar', $est->id),'method'=>'POST')) }}

<input type="hidden" id="idobra" name="idobra" value="{{ $obra->id }}">
<div class="row">
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('nombre','Nombre o Descripción') }}
		<div class="controls">
			{{ Form::text('nombre',null,array('class'=>'form-control', 'required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('numrevision','No. Rev') }}
		<div class="controls">
			{{ Form::text('numrevision',null,array('class'=>'form-control', 'required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('numestimacion','Estimación') }}
		<div class="controls">
			{{ Form::text('numestimacion',null,array('class'=>'form-control', 'required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('festimacion','Fecha') }}
		<div class="controls">
			{{ Form::text('festimacion',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('fdevolucion','Fecha Devolución') }}
		<div class="controls">
			{{ Form::text('fdevolucion',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('importe','Importe') }}
		<div class="controls">
			{{ Form::text('importe',null,array('class'=>'form-control')) }}
		</div>
	</div>
		<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('finicio_est','Inicio') }}
		<div class="controls">
			{{ Form::text('finicio_est',null,array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('ftermino_est','Termino') }}
		<div class="controls">
			{{ Form::text('ftermino_est',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('estatus','Estatus') }}
		<div class="controls">
			{{ Form::select('estatus',$estatus,null,array('class'=>'form-control col-xs-12 col-sm-3 col-md-3 col-lg-3')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('observacion','Observación') }}
		<div class="controls">
			{{ Form::textarea('observacion',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('recibido_por','Recibido por: ') }}
		<div class="controls">
			{{ Form::textarea('recibido_por',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('nombreobra_ori','Nombre Original: ') }}
		<div class="controls">
			{{ Form::textarea('nombreobra_ori',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>
</div>
<br>
	<div class="form-group">
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('estimaciones/listado') }}" class="btn btn-primary">Cancelar</a>
	</div>

{{ Form::close() }}

</div>
