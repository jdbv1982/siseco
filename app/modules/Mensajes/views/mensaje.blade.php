<div class="row col-sm-6 col-sm-offset-3">
<legend>Historial del mensaje</legend>
    <a href="#" class="btn btn-success" id="add-resp">
        <span class="glyphicon glyphicon-share-alt"></span>
    </a>

    <div class="panel-group" id="accordion">
        @foreach ($mensajes as $m)
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="izq">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#{{$m->id}}">
                            Enviado por: {{ $m->nombre_remitente }}
                        </a>
                    </h4>

                </div>
                    <div class="text-right">
                        Fecha: {{ $m->created_at }}
                        @if($m->status == 0)
                        <a class="change-status" href="#" id-msg="{{$m->id}}"><span id="mensaje-status-{{$m->id}}" class="glyphicon glyphicon-certificate"></span></a>
                        @else
                        <a class="change-status" href="#" id-msg="{{$m->id}}"><span id="mensaje-status-{{$m->id}}" class="glyphicon glyphicon-certificate no-leido"></span></a>
                        @endif
                    </div>
            </div>
            <div id="{{$m->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    {{ $m->mensaje }}
                </div>
            </div>
        </div>
        @endforeach
    </div>


@include('respuesta', [ 'mensaje_id'=>$m->mensaje_id ,'dest_id'=> $m->remitente, 'destinatario'=>$m->nombre_remitente])



