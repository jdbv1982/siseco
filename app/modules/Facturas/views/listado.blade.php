   <h2>Lista de Facturas</h2>
    <div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Amt. x Ant</th>
            <th>Supervision</th>
            <th>Secodam</th>
            <th>Cmic</th>
            <th>Liquido</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($datos as $dato)
    <tr>
        <td>{{ $dato->id }}</td>
        <td>{{ $dato->folio }}</td>
        <td>{{ $dato->fechaexp }}</td>
        <td>{{ $dato->subtotal }}</td>
        <td>{{ $dato->amtxant }}</td>
        <td>{{ $dato->supervision }}</td>
        <td>{{ $dato->secodam }}</td>
        <td>{{ $dato->cmic }}</td>
        <td>{{ $dato->liquido }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
