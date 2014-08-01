<h3>Nueva Orden de Pago</h3>

{{ Form::open(array('url'=>'pagos/guardar','method'=>'POST')) }}
<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('folio','No. Folio:') }}
	{{ Form::text('folio',$clc->no_afectacion,array('class'=>'form-control text-right')) }}
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
<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('clc','No. Clc:') }}
	{{ Form::text('clc',$clc->no_afectacion,array('class'=>'form-control', 'readonly','disabled')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('factura','No. factura:') }}
	{{ Form::text('factura',$factura,array('class'=>'form-control', 'readonly','disabled')) }}
</div>

<div class="form-group col-xs-12 col-sm-3">
	{{ Form::label('beneficiario','Nombre del Beneficiario:') }}
	{{ Form::text('beneficiario',$beneficiario,array('class'=>'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-7">
	{{ Form::label('observaciones','observaciones:') }}
	{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'3')) }}
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
	{{ Form::label('id_cuenta','Cuenta') }}
            {{ Form::select('id_cuenta', $cuentas,null, array('class' => 'form-control upper')) }}
</div>

<div class="form-group col-xs-12 col-sm-5">
	{{ Form::label('observaciones','concepto:') }}
	{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'3')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('deducciones','Deducciones:') }}
	{{ Form::text('deducciones',null,array('class'=>'form-control')) }}
</div>
<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('aditivas','Aditivas:') }}
	{{ Form::text('aditivas',null,array('class'=>'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('importe','Importe:') }}
	{{ Form::text('importe',null,array('class'=>'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('total','Total:') }}
	{{ Form::text('total',null,array('class'=>'form-control')) }}
</div>

<div class="form-group col-xs-12 col-sm-12">
	<br>
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	<a href="{{ URL::to('clc/listado') }}" class="btn btn-primary">Cancelar</a>
</div>

{{ Form::close() }}
