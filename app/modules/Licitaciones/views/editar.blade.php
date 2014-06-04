<div class="col-xs-10 col-xs-offset-1">
	@include('layouts/errores')
	{{ Form::model($licitacion, array('url'=> array('licitaciones/editar', $licitacion->id),'method'=>'POST')) }}
	<input type="hidden" name="id" id="id" value="{{ $id }}">
	<input type="hidden" name="idfuente_" id="id" value="{{ $planeacion->idfgeneral }}">

	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br>
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Datos Licitaciones</legend>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_modcontrato','Modalidad de Contratación') }}
				<div class="controls">
					{{ Form::text('l_modcontrato',null,array('class'=>'form-control')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_procedimiento','Procedimiento') }}
				<div class="controls">
					{{ Form::text('l_procedimiento',null,array('class'=>'form-control')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_contrato','Contrato') }}
				<div class="controls">
					{{ Form::text('l_contrato',null,array('class'=>'form-control','required')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_fecha','Fecha') }}
				<div class="controls">
					{{ Form::text('l_fecha',null,array('class'=>'form-control')) }}
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_montocontratado','Monto Contratado') }}
				<div class="controls">
					{{ Form::text('l_montocontratado',null,array('class'=>'form-control')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-13 col-md-3 col-lg-3">
				{{ Form::label('l_anticipo','Anticipo') }}
				<div class="controls">
					{{ Form::text('l_anticipo',null,array('class'=>'form-control')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_ndias','Dias de Ejecucion') }}
				<div class="controls">
					{{ Form::text('l_ndias',null,array('class'=>'form-control')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_finicio','Fecha de Inicio') }}
				<div class="controls">
					{{ Form::text('l_finicio',null,array('class'=>'form-control')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_ffinal','Fecha Final') }}
				<div class="controls">
					{{ Form::text('l_ffinal',null,array('class'=>'form-control')) }}
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Datos De la Empresa</legend>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_idempresa','Empresa') }}
				<div class="input-group">
					{{ Form::select('l_idempresa',$empresas,null,array('class'=>'form-control')) }}
					<span class="input-group-btn">
						<a href="#" id="masoficio" data-toggle="modal" data-target="#contratista" class="btn btn-default"> + </a>
					</span>
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_tipoemp','Tipo') }}
				<div class="controls">
					{{ Form::select('l_tipoemp',array('1'=>'Local','2'=>'Foranea'),null,array('class'=>'form-control col-xs-12 col-sm-3 col-md-3 col-lg-3')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_origen','Estado') }}
				<div class="controls">
					{{ Form::select('l_origen',$estados,null,array('class'=>'form-control')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('','') }}
				<div class="controls">
					{{ Form::checkbox('l_cmic',1) }}
					{{ Form::label('l_cmic','CMIC') }}
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Fianzas</legend>
			<a href="#" id="masoficio" data-toggle="modal" data-target="#fianza" class="btn btn-primary"> + </a>
			<table cellpadding="0" cellspacing="0" border="0" id="tbfianzas" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th># Fianza</th>
						<th>Monto</th>
						<th>Fecha</th>
						<th>Tipo</th>
						<th># Factura</th>
						<th>Monto</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($fianzas as $fianza)
					<tr>
						<td>{{ $fianza->numfianza }}</td>
						<td>{{ $fianza->montofianza }}</td>
						<td>{{ date("d/m/Y",strtotime($fianza->fechafianza)) }}</td>
						<td>{{ $fianza->nombre }}</td>
						<td>{{ $fianza->numfactura }}</td>
						<td>{{ $fianza->montofactura }}</td>
						<td>
							@if(Auth::user()->verificaPermiso(Auth::user()->id, 34) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
							<a class="btn btn-primary" href="{{ URL::to('licitaciones/editarfianza/'.$fianza->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Diferimientos</legend>
			@if (empty($diferimientos))
				<a href="#" data-toggle="modal" data-target="#diferimientos" class="btn btn-primary"> + </a>
			@endif
			<table cellpadding="0" cellspacing="0" border="0" id="tbdiferimientos" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th># Diferimiento</th>
						<th>Fecha</th>
						<th>Cantidad</th>
						<th>F. Inicio</th>
						<th>F. Termino</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($diferimientos as $diferimiento)
					<tr>
						<td>{{ $diferimiento->numdiferimiento }}</td>
						<td>{{ date("d/m/Y",strtotime($diferimiento->fechadiferimiento)) }}</td>
						<td>{{ $diferimiento->cantidad }}</td>
						<td>{{ date("d/m/Y",strtotime($diferimiento->finiciodiferimiento)) }}</td>
						<td>{{ date("d/m/Y",strtotime($diferimiento->ffinaldiferimiento)) }}</td>
						<td>
							@if(Auth::user()->verificaPermiso(Auth::user()->id, 40) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
							<a class="btn btn-primary" href="{{ URL::to('licitaciones/editardiferimiento/'.$diferimiento->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Convenios</legend>
			<a href="#" id="masoficio" data-toggle="modal" data-target="#convenio" class="btn btn-primary"> + </a>
			<table cellpadding="0" cellspacing="0" border="0" id="tbconvenios" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th># Convenio</th>
						<th>Fecha</th>
						<th>Tipo</th>
						<th>Cantidad</th>
						<th>F. Inicio</th>
						<th>F. Termino</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($convenios as $convenio)
					<tr>
						<td>{{ $convenio->numconvenio }}</td>
						<td>{{ date("d/m/Y",strtotime($convenio->fechaconvenio)) }}</td>
						<td>{{ $convenio->nombre }}</td>
						<td>{{ $convenio->cantidad }}</td>
						<td>{{ date("d/m/Y",strtotime($convenio->finicio)) }}</td>
						<td>{{ date("d/m/Y",strtotime($convenio->ffinal)) }}</td>
						<td>
							@if(Auth::user()->verificaPermiso(Auth::user()->id, 33) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
							<a class="btn btn-primary" href="{{ URL::to('licitaciones/editarconvenio/'.$convenio->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			<legend>Addendum</legend>
			<a href="#" data-toggle="modal" data-target="#adendo" class="btn btn-primary"> + </a>
			<table cellpadding="0" cellspacing="0" border="0" id="tbadendos" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Observaciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($adendos as $adendo)
					<tr>
						<td>{{ $adendo->nombreadendo }}</td>
						<td>{{ $adendo->descadendo }}</td>
						<td>{{ $adendo->obsadendo }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>


	</div>

	{{ Form::close(); }}

	@include('fianzas_partial')
	@include('convenio_partial')
	@include('adendum_partial')
	@include('contratista_partial')
</div>

	@include('diferimiento_partial')

