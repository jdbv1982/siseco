   <h2>Lista de Notificaciones</h2>
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Remitente</th>
            <th>Titulo</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($notificaciones as $notificacion)
    <tr>
        <td>{{ $notificacion->id }}</td>
        <td>{{ $notificacion->nombre }}</td>
        <td>{{ $notificacion->titulo }}</td>
        <td>{{ $notificacion->mensaje }}</td>
  
    </tr>
    @endforeach
    </tbody>
  </table>
