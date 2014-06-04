{{ Form::open(array('url'=> array('agregacontratista', $id),'method'=>'POST','id'=>'addcontratista')) }}
<input type="hidden" id="idobra" name="idobra" value="{{$id}}">
<div class="modal fade" id="contratista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Contratista</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
                        {{ Form::label('numero','Numero o Clave') }}
                        <div class="controls">
                            {{ Form::text('numero',null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {{ Form::label('razsoc','Razon Social o Nombre') }}
                        <div class="controls">
                            {{ Form::text('razsoc',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {{ Form::label('domicilio','Domicilio') }}
                        <div class="controls">
                            {{ Form::text('domicilio',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('replegal','Representante Legal') }}
                        <div class="controls">
                            {{ Form::text('replegal',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('telefonos','Telefonos') }}
                        <div class="controls">
                            {{ Form::text('telefonos',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('correo','Correo Electronico') }}
                        <div class="controls">
                            {{ Form::text('correo',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('celular','Telefono Celular') }}
                        <div class="controls">
                            {{ Form::text('celular',null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('rfc','RFC') }}
                        <div class="controls">
                            {{ Form::text('rfc',null,array('class'=>'form-control')) }}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="setcontratista" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

