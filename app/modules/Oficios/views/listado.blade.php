<h2>Listado de Oficios</h2>

<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	<th>Id</th>
            <th>Nombre</th>
            <th>Numero</th>
            <th>Fecha</th>
            <th>Fecha Recibido por la Dependencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($oficios as $oficio)
    <tr>
    	<td>{{ $oficio->id }}</td>
        <td>{{ $oficio->nombreoficio }}</td>
        <td>{{ $oficio->numerooficio }}</td>
        <td>{{ $oficio->fechaoficio }}</td>
        <td>{{ $oficio->fecharecibido }}</td>
        <td class="text-center"><a class="btn btn-primary" href="{{ URL::to('oficios/editar/'.$oficio->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>

    </tr>
    @endforeach
    </tbody>
  </table>
