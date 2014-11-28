<div class="boxContenido">
	<p>
		<a class="btn btn-primary" href="{{ URL::to('planeacion/nuevo') }}"><span class="glyphicon glyphicon-book"></span>  Nueva Obra</a>
	</p>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Listado de Obras de Administración Directa 2014</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Oficio Autorizacion</th>
					<th>Num. Obra</th>
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
						<td>{{$obra->numeroobra}}</td>
						<td><p>{{$obra->nombreobra}}<p></td>
						<td>{{$obra->nombre_fuente}}</td>
						<td>{{$obra->l_contrato}}</td>
						<td>{{$obra->nombre_region}}</td>
						<td>{{$obra->residencia}}</td>
						<td>{{$obra->tipo_obra}}</td>
						<td>{{$obra->status_obra}}</td>
						<td width="10%" class="text-center">
							@if ($obra->l_contrato == null)
								<a class="btn btn-warning" href="{{ URL::to('obras/actualizar-ad/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
							@else
								<a class="btn btn-primary" href="{{ URL::to('obras/actualizar-ad/'.$obra->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
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
