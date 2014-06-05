{{ Form::open(array('url'=> array('agregaadendo', $id),'method'=>'POST','id'=>'idadendo')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $id}}">
<div class="modal fade" id="adendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Addendum</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('nombreadendo','Nombre Addendum') }}
                        <div class="controls">
                            {{ Form::text('nombreadendo',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    	{{ Form::label('descadendo','Descripcion') }}
                    	<div class="controls">
                    		{{ Form::textarea('descadendo', null, array('class'=>'form-control','rows'=>'3','required') ) }}
                    	</div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    	{{ Form::label('obsadendo','Observaciones') }}
                    	<div class="controls">
                    		{{ Form::textarea('obsadendo', null, array('class'=>'form-control','rows'=>'3','required') ) }}
                    	</div>
                    </div>

            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addadendo" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
