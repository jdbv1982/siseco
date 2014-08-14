<h2>Generar Pago</h2>

@include('layouts/errores')

{{ Form::model($caja, array('url'=> array('caja/actualizar', $caja->id),'method'=>'POST')) }}

{{Form::hidden('orden_id', $pago->id)}}
{{Form::hidden('clc_id', $pago->clc_id)}}

<div class="form-group col-xs-12 col-sm-3">
	{{ Form::label('no_cheque','Cheque o Spei:') }}
	{{ Form::text('no_cheque',null,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-3 col-lg-2">
	{{ Form::label('fecha','fecha') }}
	<div class="input-group col-xs-12">
	<span class="input-group-addon glyphicon glyphicon-calendar"></span>
	{{ Form::text('fecha',null,array('class'=>'form-control text-right fecha','required')) }}
</div>
</div>

<div class="form-group col-xs-12 col-sm-6 col-lg-7">
	{{ Form::label('beneficiario','Beneficiario') }}
	{{ Form::text('beneficiario',null,array('class'=>'form-control','required','readonly')) }}
</div>

<div class="form-group col-xs-12 col-sm-3">
	{{ Form::label('importe','Importe') }}
	{{ Form::text('importe',null,array('class'=>'form-control text-right','required','readonly')) }}
</div>

<div class="form-group col-xs-12 col-sm-9">
	{{ Form::label('importe_let','Importe en Letra') }}
	{{ Form::text('importe_let',$cantidad,array('class'=>'form-control','required','readonly')) }}
</div>

<div class="form-group col-xs-12 col-sm-6">
	{{ Form::label('concepto','Concepto de Pago:') }}
	{{ Form::textarea('concepto',null,array('class'=>'form-control','required','rows'=>'5','readonly')) }}
</div>


<div class="form-group col-xs-12 col-sm-6">
	{{ Form::label('recibido_por','Recibido por:') }}
	{{ Form::text('recibido_por',null,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-6">
	{{ Form::label('status_id','Estatus de la Clc') }}
	{{ Form::select('status_id', $status,$pago->status_id, array('class' => 'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-12">
	<br>
	@if($pago->status_id < 4)
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	@endif
	<a href="{{ URL::to('caja/listado') }}" class="btn btn-primary">Regresar</a>
	<a href="{{ URL::to('caja/impresion',[$pago->banco_id, $caja->id]) }}" target="_blank" class="btn btn-primary">Imprimir</a>
</div>

{{ Form::close() }}

