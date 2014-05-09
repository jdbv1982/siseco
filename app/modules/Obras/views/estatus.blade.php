<div class="col-xs-8 col-xs-offset-2">
<h3>Resumen de la Obra</h3>

@if(Auth::user()->verificaPermiso(Auth::user()->id, 5) == 'true')
	    	{{ Form::model($planeacion[0], array('url'=> array('planeacion/residencia', $planeacion[0]->id),'method'=>'POST', 'class'=>'target')) }}
@endif

<table class="table table-hover">
	<tr>
		<td><strong>No. de Oficio</strong></td>
		<td class="upper">{{ isset($planeacion[0]->numerooficio) ? $planeacion[0]->numerooficio : '' }}</td>
	</tr>
	<tr>
		<td><strong>Nombre de la Obra</strong></td>
		<td class="upper">{{ $planeacion[0]->nombreobra }}</td>
	</tr>
	<tr>
		<td><strong>Caracteristicas</strong></td>
		<td class="upper">{{ $planeacion[0]->caracteristicas }}</td>
	</tr>
	<tr>
		<td><strong>Procedimiento</strong></td>
		<td class="upper">{{ $planeacion[0]->l_procedimiento }}</td>
	</tr>
	<tr>
		<td><strong>Contrato</strong></td>
		<td class="upper">{{ $planeacion[0]->l_contrato }}</td>
	</tr>
	<tr>
		<td><strong>Monto</strong></td>
		<td class="upper">{{ $planeacion[0]->l_montocontratado }}</td>
	</tr>
	<tr>
		<td><strong>Anticipo</strong></td>
		<td class="upper">{{ $planeacion[0]->l_anticipo }}</td>
	</tr>
	<tr>
		<td><strong>Periodo de Ejecucion</strong></td>
		<td class="upper">Se tiene un periodo de ejecucion de {{ $planeacion[0]->l_ndias }} dias </td>
	</tr>
	<tr>
		<td><strong>No. de Oficio</strong></td>
		<td class="upper">{{ $planeacion[0]->numerooficio }}</td>
	</tr>
	@if(Auth::user()->verificaPermiso(Auth::user()->id, 2) == 'true')
		<tr>
			<td><strong>Estatus</strong></td>
			<td class="upper">
				<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
					{{ Form::text('estatus',null,array('class'=>'form-control')) }}
				</div>
			</td>			
		</tr>
		<tr>
			<td><strong>Observaciones</strong></td>
			<td class="upper">
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'2')) }}
				</div>
			</td>
		</tr>
	@endif

	@if(Auth::user()->verificaPermiso(Auth::user()->id, 5) == 'true')
		<tr>
			<td><strong>Residencia</strong></td>
			<td class="upper">
				<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
					{{ Form::select('idresidencia', $residencias,null, array('class' => 'form-control')) }}
				</div>
			</td>			
		</tr>
	@endif
</table>


    
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
    <a href="{{ URL::previous() }}" class="btn btn-primary">Cancelar</a>
</div>
{{ Form::close() }}


</div>
