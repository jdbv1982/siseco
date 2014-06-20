<h3>Listado de Estructuras Financieras</h3>

<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	<th># Obra</th>
            <th>Concepto</th>
            <th>Inv. Federal</th>
            <th>Inv. Estatal</th>
            <th>Inv. municipal</th>
            <th>Inv. Participantes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($estructura as $est)
    <tr>
        <td>{{ $est->idobra }}</td>
        <td>{{ $est->concepto }}</td>
        <td>{{ $est->invfederal }}</td>
        <td>{{ $est->investatal }}</td>
        <td>{{ $est->invmunicipal }}</td>
        <td>{{ $est->invparticipantes }}</td>
        <td class="text-center"><a class="btn btn-primary" href="{{ URL::to('estructura/editar/'.$est->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>

    </tr>
    @endforeach
    </tbody>
  </table>
