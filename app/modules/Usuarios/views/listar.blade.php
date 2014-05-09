<?php
    $estados=[0=>'Inactivo',1=>'Activo'];
?>
   <h2>Lista de Usuarios</h2>
	<p>		
   		<a href="{{ URL::to('usuarios/nuevo') }}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span>  Nuevo Usuario</a>
        <a href="{{ URL::to('/inicio') }}" class="btn btn-default">Cancelar</a>
    </p>
    <div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->nombre }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->nombreperfil }}</td>
        <td>
            @if(isset($estados[$usuario->status]))
                {{ $estados[$usuario->status] }}
            @endif
        </td>
        <td class="text-center">
            <a class="btn btn-default" href="{{ URL::to('usuarios/editar/'.$usuario->id) }}">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
                <a class="btn btn-default" href="{{ URL::to('usuarios/permisos/'.$usuario->id) }}">
                <span class="glyphicon glyphicon-list-alt"></span>
            </a>
        </td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>
