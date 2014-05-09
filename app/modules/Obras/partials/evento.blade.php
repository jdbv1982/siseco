{{ Form::open(array('url'=> array('agregaevento'),'method'=>'POST','id'=>'postvento')) }}
<div class="modal fade" id="formevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">                  
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
            </div>            
            <div class="modal-body">
            	<div class="row">
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('clave','Clave') }}
                        <div class="controls">
                            {{ Form::text('clave',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('nombre','Nombre o Descripción') }}
                        <div class="controls">
                            {{ Form::text('nombre',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
            	</div>
            </div>           
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="saveevento" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
