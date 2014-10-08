<div class="row col-sm-6 col-sm-offset-3">
<legend>Historial del mensaje</legend>
    <a href="#" class="btn btn-success" id="add-resp">
        <span class="glyphicon glyphicon-share-alt"></span>
    </a>

@foreach ($mensajes as $m)
    <div class="panel panel-info">
    	<div class="panel-heading">Enviado por: {{ $m->nombre_remitente }}</div>
      <div class="panel-body">
        {{ $m->mensaje }}
      </div>
      <div class="panel-footer text-right">Fecha: {{ $m->created_at }}</div>
    </div>
    @endforeach
</div>


@include('respuesta', [ 'mensaje_id'=>$m->mensaje_id ,'dest_id'=> $m->remitente, 'destinatario'=>$m->nombre_remitente])