<div class="row col-sm-6 col-sm-offset-3">
<h2>Información</h2>

	<p><strong>Numero: </strong>{{ $obra->numeroobra }}</p>
	<p><strong>Nombre: </strong>{{ $obra->nombreobra }}</p>

 @if (! is_null($licitaciones))
 	<legend>Actualizar Informacion</legend>

	{{ Form::model($licitaciones, array('url'=> array('licitaciones/ad', $obra->id), 'method'=>'POST','class'=>'form-inline')) }}
		<div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		    	<br>
		        <legend>Datos Licitaciones</legend>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_modcontrato','Modalidad de Contratación') }}
		        	<div class="controls">
		        		{{ Form::text('l_modcontrato','Administracion Directa',array('class'=>'form-control')) }}
		        	</div>
		        </div>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_contrato','Numero de Convenio') }}
		        	<div class="controls">
		        		{{ Form::text('l_contrato',null,array('class'=>'form-control','required')) }}
		        	</div>
		        </div>

		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_montocontratado','Monto') }}
		        	<div class="controls">
		        		{{ Form::text('l_montocontratado',null,array('class'=>'form-control','required')) }}
		        	</div>
		        </div>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_fecha','Fecha') }}
		        	<div class="controls">
		        		{{ Form::text('l_fecha',null,array('class'=>'form-control fecha')) }}
		        	</div>
		        </div>
		    </div>
		   </div>

		   <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			<a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
		</div>
{{ Form::close() }}

 @else
 	<br>
	<legend>Agregar Información</legend>
	{{ Form::open(array('url'=> array('licitaciones/ad', $obra->id), 'method'=>'POST','class'=>'form-inline')) }}
		<div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		    	<br>
		        <legend>Datos Licitaciones</legend>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_modcontrato','Modalidad de Contratación') }}
		        	<div class="controls">
		        		{{ Form::text('l_modcontrato','Administracion Directa',array('class'=>'form-control')) }}
		        	</div>
		        </div>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_contrato','Numero de Convenio') }}
		        	<div class="controls">
		        		{{ Form::text('l_contrato',null,array('class'=>'form-control','required')) }}
		        	</div>
		        </div>

		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_montocontratado','Monto') }}
		        	<div class="controls">
		        		{{ Form::text('l_montocontratado',$monto,array('class'=>'form-control','required')) }}
		        	</div>
		        </div>
		        <div class="form-group col-xs-12 col-sm-6">
		        	{{ Form::label('l_fecha','Fecha') }}
		        	<div class="controls">
		        		{{ Form::text('l_fecha',null,array('class'=>'form-control fecha')) }}
		        	</div>
		        </div>
		    </div>
		   </div>

		   <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br>
			{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			<a href="{{ URL::to('obras/administracion-directa') }}" class="btn btn-primary">Cancelar</a>
		</div>
{{ Form::close() }}
 @endif

</div>
