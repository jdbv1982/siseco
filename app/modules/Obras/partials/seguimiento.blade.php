{{ Form::open(array('url'=> array('seguimiento'),'method'=>'POST','id'=>'postseguimiento')) }}
<div class="modal fade" id="seguimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                    <strong>Error!</strong> Corregir los siguientes Errores:.
                    <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Seguimiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{ Form::hidden('id', $planeacion[0]->id) }}
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('idclasseguimiento','Residencia') }}
                        <div class="controls">
                            {{ Form::select('idclasseguimiento', $clasificadores,null, array('class' => 'form-control upper')) }}
                        </div>
                        <br>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('comentarios','Comentarios') }}
                        <div class="controls">
                            {{ Form::textarea('comentarios', $planeacion[0]->comentarios, array('class'=>'form-control','rows'=>'3') ) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('concejecutar','Conceptos a Ejecutar') }}
                        <div class="controls">
                            {{ Form::textarea('concejecutar', $planeacion[0]->concejecutar, array('class'=>'form-control','rows'=>'3') ) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('observaciones','Observaciones') }}
                        <div class="controls">
                            {{ Form::textarea('observaciones', $planeacion[0]->observaciones, array('class'=>'form-control','rows'=>'3') ) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('observacionesseg','Observaciones Seguimiento') }}
                        <div class="controls">
                            {{ Form::textarea('observacionesseg', $planeacion[0]->observacionesseg, array('class'=>'form-control','rows'=>'5') ) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('codigoaccion', 'Codigo de Accion') }}
                        <div class="controls">
                            {{ Form::text('codigoaccion',$planeacion[0]->codigoaccion,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        {{ Form::label('ninforme', 'Numero de Informe') }}
                        <div class="controls">
                            {{ Form::text('ninforme',$planeacion[0]->ninforme,array('class'=>'form-control')) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="saveseguimiento" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}




