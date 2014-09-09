<h2>Lista de Ordenes de pago</h2>
<div class="row">
<div class="form-group col-xs-12 col-sm-9">
@if($monto_total - $monto_ordenado > 0)
<a class="btn btn-default" href="{{ URL::to('pagos/nueva/'.$id) }}">
                <span class="glyphicon glyphicon-usd"></span>
 </a>
 @endif
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('monto_clc','Monto Clc') }}
	{{ Form::text('monto_clc',$monto_total,array('class'=>'form-control text-right','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('monto_ordenado','Total en Ordenes') }}
	{{ Form::text('monto_ordenado',$monto_ordenado,array('class'=>'form-control text-right','required')) }}
</div>

<div class="form-group col-xs-12 col-sm-1">
	{{ Form::label('monto_porpgar','Total por Pagar') }}
	{{ Form::text('monto_porpgar',$monto_total - $monto_ordenado,array('class'=>'form-control text-right','required','id'=>'monto_a_pagar')) }}
</div>

</div>
<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
		<thead>
			<tr>
				<th># Orden</th>
				<th>Num. Clc</th>
				<th>Beneficiario</th>
				<th>Observaciones</th>
				<th>Concepto</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ordenes as $orden)
			<tr>
				<td>{{ $orden->id }}</td>
				<td>{{ $orden->folio }}</td>
				<td>{{ $orden->beneficiario }}</td>
				<td>{{ $orden->observaciones }}</td>
				<td>{{ $orden->concepto }}</td>
				<td>{{ $orden->total }}</td>
				<td>{{ $orden->nombre }}</td>
				<td class="text-center">
					<a class="btn btn-default" href="{{ URL::to('pagos/editar/'.$orden->id) }}">
						  <span class="glyphicon glyphicon-pencil"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


