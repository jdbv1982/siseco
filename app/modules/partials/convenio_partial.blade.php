{{ Form::open(array('url'=> array('agregaconvenio', $id),'method'=>'POST','id'=>'idconvenio')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $id}}">
<div class="modal fade" id="convenio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Convenio</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numconvenio','Numero de Convenio') }}
                        <div class="controls">
                            {{ Form::text('numconvenio',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fechaconvenio','Fecha') }}
                        <div class="controls">
                            {{ Form::text('fechaconvenio',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('tipoconvenio','Tipo') }}
                        <div class="controls">
                            {{ Form::select('tipoconvenio',$tconvenio, null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('cantidad','Cantidad') }}
                        <div class="controls">
                            {{ Form::text('cantidad',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('finicio','Fecha Inicio') }}
                        <div class="controls">
                            {{ Form::text('finicio',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('ffinal','Fecha Termino') }}
                        <div class="controls">
                            {{ Form::text('ffinal',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
		            {{ Form::label('observ_convenio','Observaciones') }}
		            <div class="controls">
		                {{ Form::textarea('observ_convenio', null, array('class'=>'form-control','rows'=>'3') ) }}
		            </div>
		        </div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addconvenio" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
