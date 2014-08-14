<h3>Edición de Clc</h3>

<div class="row">
	@include('layouts/errores')
{{ Form::model($clc, array('url'=> array('clc/editar', $clc->id),'method'=>'POST', 'class'=>'target')) }}

{{ Form::hidden('idobra', $clc->idobra) }}
{{ Form::hidden('no_afectacion', $clc->no_afectacion) }}
<p><strong>Numero de la Obra: </strong>{{ $obra->numeroobra }}</p>
<p><strong>Nombre de la Obra: </strong>{{ $obra->nombreobra }}</p>
<div class="form-group col-xs-12">
    {{ Form::label('concepto','Concepto') }}
    {{ Form::textarea('concepto', null, array('class'=>'form-control','rows'=>'3') ) }}
</div>

<div class="form-group col-xs-2">
	{{ Form::label('id_status','Estatus de la Clc') }}
	{{ Form::select('id_status', $status,null, array('class' => 'form-control')) }}
</div>
<div class="form-group col-xs-2">
	{{ Form::label('num_spei','Numero de spei') }}
	{{ Form::text('num_spei', null, array('class' => 'form-control')) }}
</div>
</div>
<br>
<div class="row col-xs-2">
	<p class="text-center"><strong>Factura</strong></p>
@if( ! empty($factura))
	<p class="text-right"><strong>Subtotal:</strong>{{$factura[0]->subtotal}}</p>
	<p class="text-right"><strong>Amortizacion de Anticipo:</strong>{{$factura[0]->amtzxant}}</p>
	<p class="text-right"><strong>Gasots de Supervision:</strong>{{$factura[0]->supervision}}</p>
	<p class="text-right"><strong>SECODAM:</strong>{{$factura[0]->secodam}}</p>
	<p class="text-right"><strong>CMIC:</strong>{{$factura[0]->cmic}}</p>
	<p class="text-right"><strong>Liquido:</strong>{{$factura[0]->liquido}}</p>
@else
	<p>No se encontro la factura de referencia de esta Clc</p>
@endif
</div>

<div class="row col-xs-3">
	<p class="text-center"><strong>CLC</strong></p>
	<p class="text-right"><strong>{{$detalle_clc[0]->descripcion}}: </strong>{{$detalle_clc[0]->total}}</p>
	<p class="text-right"><strong>{{$detalle_clc[1]->descripcion}}: </strong>
		@if($detalle_clc[1]->signo == '-')
			{{$detalle_clc[1]->signo}}
		@endif
		{{$detalle_clc[1]->total}}</p>
	<p class="text-right"><strong>{{$detalle_clc[2]->descripcion}}: </strong>
		@if($detalle_clc[1]->signo == '-')
			{{$detalle_clc[2]->signo}}
		@endif
		{{$detalle_clc[2]->total}}</p>
	<p class="text-right"><strong>Total: </strong>{{$total_clc[0]->total}}</p>
</div>


<br>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
        <a href="{{ URL::previous() }}" class="btn btn-primary">Cancelar</a>
    </div>

{{ Form::close() }}
