<div class="boxContenido">
	<p>
		<a class="btn btn-primary" href="{{ URL::to('planeacion/nuevo') }}"><span class="glyphicon glyphicon-book"></span>  Nueva Obra</a>
	</p>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Listado de Obras</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Oficio Autorizacion</th>
					<th>Nombre</th>
					<th>Ftto</th>
					<th>Contrato</th>
					<th>Region</th>
					<th>Residencia</th>
					<th>Tipo de Obra</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($obras as $obra)
					<tr>
						<td>{{$obra->id}}</td>
						<td class="upper">{{$obra->numerooficio}}</td>
						<td><p>{{$obra->nombreobra}}<p></td>
						<td>{{$obra->nombre_fuente}}</td>
						<td>{{$obra->l_contrato}}</td>
						<td>{{$obra->nombre_region}}</td>
						<td>{{$obra->residencia}}</td>
						<td>{{$obra->tipo_obra}}</td>
						<td>{{$obra->status_obra}}</td>
						<td width="10%" class="text-center">
								@if(Auth::user()->verificaPermiso(Auth::user()->id, 1) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
									<a class="btn btn-primary" href="{{ URL::to('documentacion/nuevo/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
								@endif

								@if(Auth::user()->verificaPermiso(Auth::user()->id, 2) == 'true') {{--PERMISO PARA CAMBIAR EL STATUS DE LA OBRA--}}
									<a class="btn btn-primary" href="{{ URL::to('obras/estatus/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
								@endif

								@if(Auth::user()->verificaPermiso(Auth::user()->id, 5) == 'true') {{--PERMISO PARA CAMBIAR EL STATUS DE LA OBRA--}}
									<a class="btn btn-primary" href="{{ URL::to('obras/estatus/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
								@endif

								@if(Auth::user()->verificaPermiso(Auth::user()->id, 3) == 'true') {{--PERMISO VER EL RESUMEN DE LA OBRA Y PODER EDITAR--}}
									@if ($obra->l_contrato == null)
										<a class="btn btn-warning" href="{{ URL::to('obras/resumen/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
									@else
										<a class="btn btn-primary" href="{{ URL::to('obras/resumen/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
									@endif
								@endif
								@if(Auth::user()->verificaPermiso(Auth::user()->id, 6) == 'true') {{--PERMISO PARA CAMBIAR EL STATUS DE LA OBRA--}}
									<a class="btn btn-primary" href="{{ URL::to('avance/nuevo/'.$obra->id) }}"><span class="glyphicon glyphicon-road"></span></a>
									<a class="btn btn-primary" href="{{ URL::to('avance/timeline/'.$obra->id) }}"><span class="glyphicon glyphicon-random"></span></a>
								@endif
								@if(Auth::user()->verificaPermiso(Auth::user()->id, 32) == 'true') {{--PERMISO PARA IMPRIMIR EL ANEXO VI--}}
									<a class="btn btn-primary" href="{{ URL::to('reportes/anexovi/'.$obra->id) }}">VI</a>
								@endif
						</td>
					</tr>
				@endforeach
			</tbody>

		</table>
	</div>
	</div>
</div>
</div>
