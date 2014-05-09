<div class="col-xs-10 col-xs-offset-1">
    <h2>Listado de Estimaciones</h2>
<p>			
    <a href="{{ URL::to('/inicio') }}" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span></a>
</p>
<div class="table-responsive">
   <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	<th>#</th>
            <th>Numero Obra</th>
            <th>Nombre</th>
            <th>Estimacion</th>
            <th>Revision</th>
            <th>Estatus</th>
            <th>Importe</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach ($datos as $dato)
    <tr>
    	<td>{{ $dato->id }}</td>
        <td>{{ $dato->numeroobra }}</td>
        <td>{{ $dato->nombreobra }}</td>
        <td>{{ $dato->nombre }}</td>
        <td>{{ $dato->numrevision }}</td>
        <td>{{ $dato->estatus }}</td>
        <td>{{ $dato->importe }}</td>
        <td>{{ $dato->observacion }}</td>
        <td class="text-center">
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 21) == 'true')
        	<a href="{{ URL::to('estimaciones/nuevo/'.$dato->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Agregar una Estimación"><img src="../../public/assets/images/app/estimacion.png" alt=""></a>
            @endif
            @if (!is_null($dato->idestimacion))
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 22) == 'true')
        	       <a class="btn btn-default" href="{{ URL::to('estimaciones/editar', array($dato->id, $dato->idestimacion)) }} " data-toggle="tooltip" data-placement="left" title="Editar una Estimación"><img src="../../public/assets/images/app/editar.png" alt=""></a>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 23) == 'true')
        	       <a class="btn btn-default" href="{{ URL::to('estimaciones/fechas',array($dato->id, $dato->idestimacion)) }}" data-toggle="tooltip" data-placement="left" title="Editar Fechas"><img src="../../public/assets/images/app/fechas.png" alt=""></a>
                @endif
                @if(Auth::user()->verificaPermiso(Auth::user()->id, 24) == 'true')
                    <a class="btn btn-default" href="{{ URL::to('estimaciones/facturas/'.$dato->id) }}" data-toggle="tooltip" data-placement="left" title="Agregar Facturas"><img src="../../public/assets/images/app/facturas.png" alt=""></a>
                @endif            
            @endif
        </td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>
