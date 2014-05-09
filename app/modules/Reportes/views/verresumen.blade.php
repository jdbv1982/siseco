<h1>Resumen de Obras</h1>

{{ Form::open(array('url'=>'reportes/verresumen','class'=>'form-inline')) }}
<div class="row">


<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
    	<legend>Agrupado Por:</legend>
		{{ Form::radio('filtro[]','idfgeneral',true,array('id'=>'idfgeneral')) }}
		{{ Form::label('idfgeneral','Fuente') }}
		<br>
		{{ Form::radio('filtro[]','idregion','',array('id'=>'idregion')) }}
		{{ Form::label('idregion','Region') }}
		<br>
		{{ Form::radio('filtro[]','iddistrito','',array('id'=>'iddistrito')) }}
		{{ Form::label('iddistrito','Distrito') }}
		<br>
		{{ Form::radio('filtro[]','idmunicipio','',array('id'=>'idmunicipio')) }}
		{{ Form::label('idmunicipio','Municipio') }}
		<br>
		{{ Form::radio('filtro[]','idlocalidad','',array('id'=>'idlocalidad')) }}
		{{ Form::label('idlocalidad','Localidad') }}
</div>

	<div class="controls">
		<button id="findreporte" type="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
		</button>		
	</div>



</div>

{{ Form::close() }}
