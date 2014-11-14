<h3>Permisos de Usuarios</h3>
<p><strong>Usuario: {{$usuario->nombre}}</strong></p>
{{ Form::open(array('url'=> array('permisos/editar',$usuario->id),'method'=>'POST')) }}
<div class="row">
	<div class="col-lg-6">

	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
	<a href="{{ URL::to('usuarios/listado') }}" class="btn btn-default"><span class="glyphicon glyphicon-floppy-remove"></a>
	</div>
	<div class="col-lg-6 text-right">
		<input type="checkbox" id="selecctall"> Todos los Permisos
	</div>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($permisos as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->nombre }}</td>
			<td>{{ $p->descripcion }}</td>
			<td>{{ Form::checkbox('permiso[]',$p->id,$p->visible,array('class' => 'checkbox1'))}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<p>
	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
	<a href="{{ URL::to('usuarios/listado') }}" class="btn btn-default"><span class="glyphicon glyphicon-floppy-remove"></a>
</p>
{{ Form::close() }}
