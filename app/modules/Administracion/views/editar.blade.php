@include('layouts/errores')
<h2>Editar Información</h2>

{{ Form::model($administracion, array('url'=> array('administracion/editar', $administracion->id),'method'=>'POST')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $administracion->idobra }}">
<div class="row">
	<div class="form-group col-xs-12 col-sm-4 col-md-2">
		{{ Form::label('idtipo','Tipo de CLC') }}
		<div class="controls">
			{{ Form::select('idtipo', $tclc,null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2" >
		{{ Form::label('clc','Num. CLC') }}
		<div class="controls">
			{{ Form::text('clc',null,array('class'=>'form-control', 'required','autofocus')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2">
		{{ Form::label('idnivel','Tipo de Recurso') }}
		<div class="controls">
			{{ Form::select('idnivel', $tipos,null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2">
		{{ Form::label('felab','F. Elaboracion') }}
		<div class="input-group col-xs-12">
			<span class="input-group-addon glyphicon glyphicon-calendar"></span>
			{{ Form::text('felab',null,array('class'=>'form-control text-right fecha', 'required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2 ">
		{{ Form::label('frecp','F. Recepción') }}
		<div class="input-group col-xs-12">
			<span class="input-group-addon glyphicon glyphicon-calendar"></span>
			{{ Form::text('frecp',null,array('class'=>'form-control text-right fecha')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2 ">
		{{ Form::label('numfactura','Factura') }}
		<div class="controls">
			{{ Form::text('numfactura',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2 ">
		{{ Form::label('fianza','Fianza') }}
		<div class="controls">
			{{ Form::text('fianza',$numfianzas,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-2 ">
		{{ Form::label('orden','Orden') }}
		<div class="controls">
			{{ Form::text('orden',null,array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12">
		{{ Form::label('concepto','Concepto') }}
		<div class="controls">
			{{ Form::textarea('concepto',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-3 ">
		{{ Form::label('ministrado','Ministrado') }}
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{ Form::text('ministrado',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-3 ">
		{{ Form::label('porc5','5 %') }}
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{ Form::text('porc5',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-3 ">
		{{ Form::label('porc2','2 %') }}
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{ Form::text('porc2',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-3 ">
		{{ Form::label('radicado','Radicado') }}
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{ Form::text('radicado',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-3 ">
		{{ Form::label('amort_cred_pte','Amort Cred Pte') }}
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{ Form::text('amort_cred_pte',null,array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<br>
	<div class="form-group">
		<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
		<a href="{{ URL::to('administracion/listado/'.$administracion->idobra) }}" class="btn btn-default"><span class="glyphicon glyphicon-floppy-remove"></span></a>
	</div>

{{ Form::close() }}
