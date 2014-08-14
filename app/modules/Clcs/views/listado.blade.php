   <h2>Lista de Clc's</h2>

    <div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th># Obra</th>
            <th>Nombre</th>
            <th>No. Afectacion</th>
            <th>Concepto</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($listado as $lista)
    <tr>
        <td>{{ $lista->id }}</td>
        <td>{{ $lista->numeroobra }}</td>
        <td>{{ Str::limit($lista->nombreobra, $limit = 80, $end = '...') }}</td>
        <td>{{ $lista->no_afectacion }}</td>
        <td>{{ $lista->concepto }}</td>
        <td>{{ $lista->nombre }}</td>
        <td class="text-center">
            <a class="btn btn-default" href="{{ URL::to('clc/editar/'.$lista->id) }}">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            @if($lista->num_spei != '')
            <a class="btn btn-default" href="{{ URL::to('pagos/lista/'.$lista->id) }}">
                <span class="glyphicon glyphicon-usd"></span>
            </a>
            @endif
            <a class="btn btn-default" href="{{ URL::to('clc/historial/'.$lista->id) }}">
                <span class="glyphicon glyphicon-list"></span>
            </a>
            <a class="btn btn-default" href="{{ URL::to('clc/checklist/'.$lista->id) }}">
                <span class="glyphicon glyphicon-ok-circle"></span>
            </a>
        </td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>

