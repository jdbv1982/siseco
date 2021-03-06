<h3>Nueva Orden de Pago</h3>

@include('layouts/errores')

{{ Form::open(array('url'=>'pagos/guardar','method'=>'POST')) }}
{{ Form::hidden('clc_id', $clc->id) }}
<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('folio','Folio:') }}
	{{ Form::text('folio',0,array('class'=>'form-control text-right')) }}
</div>

<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('monto_clc','Monto Clc') }}
	{{ Form::text('monto_clc',$monto_total,array('class'=>'form-control text-right','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('monto_ordenado','Total en Ordenes') }}
	{{ Form::text('monto_ordenado',$monto_ordenado,array('class'=>'form-control text-right','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('monto_porpgar','Total por Pagar') }}
	{{ Form::text('monto_porpgar',$monto_total - $monto_ordenado,array('class'=>'form-control text-right','required','id'=>'monto_a_pagar')) }}
</div>

<legend>Datos de la Obra</legend>
<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('obra','No. obra:') }}
	{{ Form::text('obra',$obra->numeroobra,array('class'=>'form-control', 'readonly','disabled')) }}
</div>

<div class="form-group col-xs-12 col-sm-10">
	{{ Form::label('nombre','Nombre:') }}
	{{ Form::textarea('nombre',$obra->nombreobra,array('class'=>'form-control','rows'=>'3', 'readonly','disabled')) }}
</div>


<legend>Datos de la Clc</legend>
<div class="row col-sm-8">
	<div class="form-group col-xs-12 col-sm-2">
		{{ Form::label('clc','Clc:') }}
		{{ Form::text('clc',$clc->no_afectacion,array('class'=>'form-control', 'readonly','disabled')) }}
	</div>
	<div class="form-group col-xs-12 col-sm-10">
		{{ Form::label('beneficiario','Nombre del Beneficiario:') }}
		{{ Form::text('beneficiario',$beneficiario,array('class'=>'form-control','required')) }}
	</div>
	<div class="form-group col-xs-12 col-sm-12">
		{{ Form::label('observaciones','observaciones:') }}
		{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'3')) }}
	</div>
</div>
<div class="row col-sm-4">
	<legend>Facturas
		<button id="addfactura" class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus"></span></button>
	</legend>
	<table  id="facturas-list">

	</table>

</div>

<legend>Datos de la Orden</legend>
<div class="form-group col-xs-12 col-sm-2">
	{{ Form::label('ejercicio_id','Ejercicio') }}
            {{ Form::select('ejercicio_id', $ejercicios,null, array('class' => 'form-control upper')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('banco_id','Banco') }}
            {{ Form::select('banco_id', $bancos,null, array('class' => 'form-control upper')) }}
</div>

<div class="form-group col-xs-12 col-sm-4">
	{{ Form::label('cuenta_id','Cuenta') }}
            {{ Form::select('cuenta_id', $cuentas,null, array('class' => 'form-control upper')) }}
</div>

<div class="form-group col-xs-12 col-sm-5">
	{{ Form::label('concepto','Concepto:') }}
	{{ Form::textarea('concepto',null,array('class'=>'form-control','rows'=>'3')) }}
</div>

<legend>Montos de la Orden
</legend>
<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('deducciones','Deducciones:') }}
	{{ Form::text('deducciones',0,array('class'=>'form-control suma-clc')) }}
</div>
<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('aditivas','Aditivas:') }}
	{{ Form::text('aditivas',0,array('class'=>'form-control suma-clc')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('importe','Importe:') }}
	{{ Form::text('importe',0,array('class'=>'form-control suma-clc','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('total','Total:') }}
	{{ Form::text('total',0,array('class'=>'form-control','id'=>'total_clc', 'required')) }}
</div>

<div class="form-group col-xs-2">
	{{ Form::label('status_id','Estatus de la Orden') }}
	{{ Form::select('status_id', $status,$clc->status_id, array('class' => 'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-12">
	<br>
	<a href="#" class="btn btn-warning" id="validar-orden">Validar</a>
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary','id'=>'btn_pago')) }}
	<a href="{{ URL::to('pagos/lista/'.$clc->id) }}" class="btn btn-primary">Cancelar</a>
</div>

{{ Form::close() }}


@include('clc/add_factura_orden');
