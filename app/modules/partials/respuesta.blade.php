<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="respuesta-mensaje">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Envio de Mensajes</h4>
            </div>
            <div class="modal-body">
                {{ Form::hidden('mensaje_id', $mensaje_id, ["id"=>"mensaje_id"]) }}
                {{ Form::hidden('destinatario', $dest_id, ["id"=>"dest_id"])}}
                <div class="form-group">
                    {{ Form::label('destinatario','Enviar a: ')}}
                    <div class="form-controls">
                        {{ Form::text('destinatario',$destinatario) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('mensaje', 'Mensaje: ')}}
                    <div class="form-controls">
                        {{ Form::textarea('mensaje', null, ['class'=>'form-control','id'=>'respuesta-msg']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="add-respuesta">Enviar</button>
            </div>
        </div>
    </div>
</div>