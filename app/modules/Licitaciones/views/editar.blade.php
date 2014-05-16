<div class="col-xs-10 col-xs-offset-1">
@include('layouts/errores')
{{ Form::model($licitacion, array('url'=> array('licitaciones/editar', $licitacion->id),'method'=>'POST')) }}
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
				{{ Form::text('l_fecha',null,array('class'=>'form-control')) }}
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
				{{ Form::text('l_finicio',null,array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
			{{ Form::label('l_ffinal','Fecha Final') }}
			<div class="controls">
				{{ Form::text('l_ffinal',null,array('class'=>'form-control')) }}
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
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br>
		<legend>Fianzas</legend>
		<a href="#" id="masoficio" data-toggle="modal" data-target="#fianza" class="btn btn-primary"> + </a>
		<table cellpadding="0" cellspacing="0" border="0" id="tbfianzas" class="datatable table table-striped table-bordered">
			<thead>
				<tr>
					<th># Fianza</th>
					<th>Monto</th>
					<th>Fecha</th>
					<th>Tipo</th>
					<th># Factura</th>
					<th>Monto</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($fianzas as $fianza)
				<tr>
					<td>{{ $fianza->numfianza }}</td>
					<td>{{ $fianza->montofianza }}</td>
					<td>{{ date("d/m/Y",strtotime($fianza->fechafianza)) }}</td>
					<td>{{ $fianza->nombre }}</td>
					<td>{{ $fianza->numfactura }}</td>
					<td>{{ $fianza->montofactura }}</td>
					<td>
						@if(Auth::user()->verificaPermiso(Auth::user()->id, 34) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
							<a class="btn btn-primary" href="{{ URL::to('licitaciones/editarfianza/'.$fianza->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br>
		<legend>Convenios</legend>
		<a href="#" id="masoficio" data-toggle="modal" data-target="#convenio" class="btn btn-primary"> + </a>
		<table cellpadding="0" cellspacing="0" border="0" id="tbconvenios" class="datatable table table-striped table-bordered">
			<thead>
				<tr>
					<th># Convenio</th>
					<th>Fecha</th>
					<th>Tipo</th>
					<th>Cantidad</th>
					<th>F. Inicio</th>
					<th>F. Termino</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($convenios as $convenio)
				<tr>
					<td>{{ $convenio->numconvenio }}</td>
					<td>{{ date("d/m/Y",strtotime($convenio->fechaconvenio)) }}</td>
					<td>{{ $convenio->nombre }}</td>
					<td>{{ $convenio->cantidad }}</td>
					<td>{{ $convenio->finicio }}</td>
					<td>{{ $convenio->ffinal }}</td>
					<td>
						@if(Auth::user()->verificaPermiso(Auth::user()->id, 33) == 'true') {{--PERMISO PARA SUBIR ARCHIVOS--}}
							<a class="btn btn-primary" href="{{ URL::to('licitaciones/editarconvenio/'.$convenio->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br>
		<legend>Addendum</legend>
		<a href="#" id="masoficio" data-toggle="modal" data-target="#adendo" class="btn btn-primary"> + </a>
		<table cellpadding="0" cellspacing="0" border="0" id="tbadendos" class="datatable table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($adendos as $adendo)
				<tr>
					<td>{{ $adendo->nombreadendo }}</td>
					<td>{{ $adendo->descadendo }}</td>
					<td>{{ $adendo->obsadendo }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>

{{ Form::close(); }}




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
                        {{ Form::label('numfianza','Numero de Fianza') }}
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
                            {{ Form::text('fechafianza',null,array('class'=>'form-control', 'required')) }}
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
                            {{ Form::text('fechaconvenio',null,array('class'=>'form-control', 'required')) }}
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
                            {{ Form::text('finicio',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('ffinal','Fecha Termino') }}
                        <div class="controls">
                            {{ Form::text('ffinal',null,array('class'=>'form-control', 'required')) }}
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
