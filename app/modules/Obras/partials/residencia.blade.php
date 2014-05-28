{{ Form::open(array('url'=> array('seguimiento'),'method'=>'POST','id'=>'postseguimiento')) }}
<div class="modal fade" id="residencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                    <strong>Error!</strong> Corregir los siguientes Errores:.
                    <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Asignar Residencia</h4>
            </div>
            <div class="modal-body">
                <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    {{ Form::label('idresidencia','Residencia') }}
                    <div class="controls">
                        {{ Form::select('idresidencia', $residencias,null, array('class' => 'form-control upper')) }}
                    </div>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="saveresidencia" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
