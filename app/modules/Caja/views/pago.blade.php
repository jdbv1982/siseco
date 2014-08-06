<h2>Generar Pago</h2>

@include('layouts/errores')

{{ Form::model($pago, array('url'=> array('caja/pagar', $pago->id),'method'=>'POST')) }}

{{Form::hidden('orden_id', $pago->id)}}

<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('no_cheque','No. Cheque o Spei:') }}
	{{ Form::text('no_cheque',null,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('fecha','fecha') }}
	<div class="input-group">
	<span class="input-group-addon glyphicon glyphicon-calendar"></span>
	{{ Form::text('fecha',null,array('class'=>'form-control text-right fecha','required')) }}
</div>
</div>

<div class="form-group col-xs-12 col-sm-4">
	{{ Form::label('beneficiario','Beneficiario') }}
	{{ Form::text('beneficiario',null,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('importe','Importe') }}
	{{ Form::text('importe',null,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-4">
	{{ Form::label('importe_let','Importe en Letra') }}
	{{ Form::text('importe_let',$cantidad,array('class'=>'form-control','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-4">
	{{ Form::label('concepto','Concepto de Pago:') }}
	{{ Form::textarea('concepto',null,array('class'=>'form-control','required','rows'=>'2')) }}
</div>

<div class="form-group col-xs-12 col-sm-4">
	{{ Form::label('recibido_por','Recibido por:') }}
	{{ Form::text('recibido_por',null,array('class'=>'form-control','required')) }}
</div>


<div class="form-group col-xs-12 col-sm-12">
	<br>
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	<a href="{{ URL::to('caja/listado') }}" class="btn btn-primary">Cancelar</a>
	<a href="{{ URL::to('caja/listado') }}" class="btn btn-primary">Imprimir</a>
</div>

{{ Form::close() }}

