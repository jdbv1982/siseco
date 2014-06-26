{{ Form::open(array('url'=> array('agregadiferimiento', $id),'method'=>'POST','id'=>'iddiferimiento')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $id}}">
<div class="modal fade" id="diferimientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Diferimiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numdiferimiento','Numero de Diferimiento') }}
                        <div class="controls">
                            {{ Form::text('numdiferimiento',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fechadiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('fechadiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('cantidad','Cantidad') }}
                        <div class="controls">
                            {{ Form::text('cantidad',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('finiciodiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('finiciodiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('ffinaldiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('ffinaldiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::label('observ_diferimiento','Observaciones') }}
                    <div class="controls">
                        {{ Form::textarea('observ_diferimiento', null, array('class'=>'form-control','rows'=>'3') ) }}
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="adddiferimiento" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
