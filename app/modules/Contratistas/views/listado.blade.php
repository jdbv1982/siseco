<h3>Listado de Contratistas</h3>
<p>		
	{{ Form::open(array('url'=>'contratistas/reporte','class'=>'form-inline')) }}
	<a href="{{ URL::to('contratistas/nuevo') }}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span>  Nuevo</a>
	<a href="{{ URL::to('/inicio') }}" class="btn btn-default">Cancelar</a>
		<button id="findreporte" type="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</button>	
	{{ Form::close() }}
</p>
<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Numero</th>
				<th>Rfc</th>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Telefonos</th>
				<th>Correo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($contratistas as $c)
			<tr>
				<td>{{ $c->id }}</td>
				<td>{{ $c->numero }}</td>
				<td>{{ $c->rfc }}</td>
				<td>{{ $c->razsoc }}</td>
				<td>{{ $c->domicilio }}</td>
				<td>{{ $c->telefonos }}</td>
				<td>{{ $c->correo }}</td>
				<td class="text-center">
					<a class="btn btn-default" href="{{ URL::to('contratistas/editar/'.$c->id) }}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

