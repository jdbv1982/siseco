<h1>Mis Mensajes</h1>


<table class="table table-bordered">
	<thead>
		<th>#</th>
		<th>Mensaje</th>
		<th>Destinatario</th>
		<th>Mensaje</th>
		<th>Remitente</th>
		<th>Leido</th>
	</thead>
	<tbody>
	@foreach ($mensajes as $m)
	<tr>
		<td>{{$m->id}}</td>
		<td>{{$m->tipo_mensaje}}</td>
		<td>{{$m->destinatario}}</td>
		<td>{{$m->mensaje}}</td>
		<td>{{$m->remitente}}</td>
		<td>{{$m->leido}}</td>
	</tr>
	@endforeach
	</tbody>

</table>

