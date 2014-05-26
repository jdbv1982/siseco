<h3>Listado de Calendarizacion</h3>

<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	<th># Obra</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($calen as $cal)
    <tr>
    	<td>{{ $cal->idobra }}</td>
        <td>{{ $cal->conceptocal }}</td>
        <td class="text-center"><a class="btn btn-primary" href="{{ URL::to('calendarizacion/editar/'.$cal->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>

    </tr>
    @endforeach
    </tbody>
  </table>
