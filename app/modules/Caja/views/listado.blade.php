   <h2>Lista de Ordenes de Pago</h2>

    <div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th># Folio</th>
            <th>Beneficiario</th>
            <th>Cuenta</th>
            <th>Observaciones</th>
            <th>Concepto</th>
            <th>Importe</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($ordenes as $lista)
    <tr>
        <td>{{ $lista->id }}</td>
        <td>{{ $lista->folio }}</td>
        <td>{{ Str::limit($lista->beneficiario, $limit = 80, $end = '...') }}</td>
        <td>{{ $lista->cuenta }}</td>
        <td>{{ $lista->observaciones }}</td>
        <td>{{ $lista->concepto }}</td>
        <td>{{ $lista->total }}</td>
        <td>{{ $lista->status }}</td>
        <td class="text-center">
            <a class="btn btn-default" href="{{ URL::to('caja/pagar/'.$lista->id) }}">
                <span class="glyphicon glyphicon-file"></span>
            </a>
        </td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>
