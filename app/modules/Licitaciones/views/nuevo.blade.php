<div class="col-xs-10 col-xs-offset-1">
@include('layouts/errores')
{{ Form::open(array('url'=> array('licitaciones/nuevo', $id), 'method'=>'POST','class'=>'form-inline')) }}
  <input type="hidden" name="id" id="id" value="{{ $id }}">
  <input type="hidden" name="idfuente_" id="id" value="{{ $planeacion->idfgeneral }}">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<br>
	{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
	<a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<br>
        <legend>Datos Licitaciones</legend>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_modcontrato','Modalidad de Contratación') }}
        	<div class="controls">
        		{{ Form::text('l_modcontrato',null,array('class'=>'form-control')) }}
        	</div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_procedimiento','Procedimiento') }}
        	<div class="controls">
        		{{ Form::text('l_procedimiento',null,array('class'=>'form-control')) }}
        	</div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_contrato','Contrato') }}
        	<div class="controls">
        		{{ Form::text('l_contrato',null,array('class'=>'form-control','required')) }}
        	</div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_fecha','Fecha') }}
        	<div class="controls">
        		{{ Form::text('l_fecha',null,array('class'=>'form-control fecha')) }}
        	</div>
        </div>
    </div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br>
    			<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{{ Form::label('l_montocontratado','Monto Contratado') }}
				<div class="controls">
					{{ Form::text('l_montocontratado',null,array('class'=>'form-control')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-13 col-md-3 col-lg-3">
				{{ Form::label('l_anticipo','Anticipo') }}
				<div class="controls">
					{{ Form::text('l_anticipo',null,array('class'=>'form-control')) }}
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_ndias','Dias de Ejecucion') }}
				<div class="controls">
					{{ Form::text('l_ndias',null,array('class'=>'form-control')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_finicio','Fecha de Inicio') }}
				<div class="controls">
					{{ Form::text('l_finicio',null,array('class'=>'form-control fecha')) }}
				</div>
			</div>

			<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
				{{ Form::label('l_ffinal','Fecha Final') }}
				<div class="controls">
					{{ Form::text('l_ffinal',null,array('class'=>'form-control fecha')) }}
				</div>
			</div>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<br>
        <legend>Datos De la Empresa</legend>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('l_idempresa','Empresa') }}
            <div class="input-group">
             {{ Form::select('l_idempresa',$empresas,null,array('class'=>'form-control')) }}
              <span class="input-group-btn">
                <a href="#" id="masoficio" data-toggle="modal" data-target="#contratista" class="btn btn-default"> + </a>
            </span>
            </div>
        </div>



        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_tipoemp','Tipo') }}
        	<div class="controls">
        		{{ Form::select('l_tipoemp',array('1'=>'Local','2'=>'Foranea'),null,array('class'=>'form-control col-xs-12 col-sm-3 col-md-3 col-lg-3')) }}
        	</div>
        </div>

        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('l_origen','Estado') }}
        	<div class="controls">
        		{{ Form::select('l_origen',$estados,null,array('class'=>'form-control')) }}
        	</div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
        	{{ Form::label('','') }}
        	<div class="controls">
        		{{ Form::checkbox('l_cmic',1) }}
        		{{ Form::label('l_cmic','CMIC') }}
        	</div>
        </div>

	</div>
</div>




{{ Form::close() }}



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
</div>
