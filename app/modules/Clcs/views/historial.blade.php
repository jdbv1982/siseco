   <h2>Historial de Estados de Clc's</h2>

    <div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Actualizado por</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($historial as $item)
    <tr>
        <td>{{ $item->nombre }}</td>
        <td>{{ $item->actualizado_por }}</td>
        <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>

<a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
