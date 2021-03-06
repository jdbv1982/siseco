{{ Form::open(array('url'=> array('agregafianza', $id),'method'=>'POST','id'=>'idfianza')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $id}}">
<div class="modal fade" id="fianza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Fianza</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numfianza','Folio') }}
                        <div class="controls">
                            {{ Form::text('numfianza',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('montofianza','Monto de la Fianza') }}
                        <div class="controls">
                            {{ Form::text('montofianza',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fechafianza','Fecha') }}
                        <div class="controls">
                            {{ Form::text('fechafianza',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('tipofianza','Tipo') }}
                        <div class="controls">
                            {{ Form::select('tipofianza',$tfianza, null,array('class'=>'form-control')) }}
                        </div>
                    </div>
            	</div>
            	<div class="row">
            		<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        {{ Form::label('idafianzadora','Afianzadora') }}
                        <div class="controls">
                            {{ Form::select('idafianzadora',$afianzadoras, null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numfactura','Numero de Factura') }}
                        <div class="controls">
                            {{ Form::text('numfactura',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('montofactura','Monto Factura') }}
                        <div class="controls">
                            {{ Form::text('montofactura',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addfianza" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
