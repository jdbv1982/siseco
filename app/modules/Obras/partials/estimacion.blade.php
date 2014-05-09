{{ Form::open(array('url'=> array('agregaconvenio', $obra[0]->id),'method'=>'POST','id'=>'idestimacion')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $obra[0]->id }}">
<div class="modal fade" id="estimacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">                  
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Estimación</h4>
            </div>            
            <div class="modal-body">
            	<div class="row">
            		<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('nombre','Nombre o Descripción') }}
                        <div class="controls">
                            {{ Form::text('nombre',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numrevision','No. de Revisión') }}
                        <div class="controls">
                            {{ Form::text('numrevision',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numestimacion','No. de Estimación') }}
                        <div class="controls">
                            {{ Form::text('numestimacion',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('festimacion','Fecha') }}
                        <div class="controls">
                            {{ Form::text('festimacion',null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fdevolucion','Fecha Devolución') }}
                        <div class="controls">
                            {{ Form::text('fdevolucion',null,array('class'=>'form-control')) }}
                        </div>
                    </div>               
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('importe','Importe') }}
                        <div class="controls">
                            {{ Form::text('importe',null,array('class'=>'form-control')) }}
                        </div>
                    </div>          
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('pejecucion','Periodo de Ejecución') }}
                        <div class="controls">
                            {{ Form::text('pejecucion',null,array('class'=>'form-control')) }}
                        </div>
                    </div>          
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('estatus','Estatus') }}
                        <div class="controls">
                            {{ Form::select('estatus',$estatus,null,array('class'=>'form-control col-xs-12 col-sm-3 col-md-3 col-lg-3')) }}
                        </div>
                    </div>                              
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {{ Form::label('observacion','Observación') }}
                        <div class="controls">
                            {{ Form::textarea('observacion',null,array('class'=>'form-control','rows'=>'2')) }}
                        </div>
                    </div>
            	</div>
                <div class="row" id="estfechas">
                    <br>
                    <legend>Fechas</legend>
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha1','Ingreso a Ventanilla') }}
                        <div class="controls">
                            {{ Form::text('fecha1',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha2','Ingreso a CAO') }}
                        <div class="controls">
                            {{ Form::text('fecha2',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha3','Ingreso a SCT') }}
                        <div class="controls">
                            {{ Form::text('fecha3',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha4','Valida SCT') }}
                        <div class="controls">
                            {{ Form::text('fecha4',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha5','Ingreso a BANOBRAS') }}
                        <div class="controls">
                            {{ Form::text('fecha5',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecha6','De Pago') }}
                        <div class="controls">
                            {{ Form::text('fecha6',null,array('class'=>'form-control')) }}
                        </div>
                    </div>  
                </div>
            </div>           
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addestimacion" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
