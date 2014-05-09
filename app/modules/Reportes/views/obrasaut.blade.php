<h2>Reporte de Obras Autorizadas</h2>

{{ Form::open(array('url'=>'reportes/verobrasaut','class'=>'form-inline')) }}
<input type="hidden" id="_nivel" value="0">
<div class="row">

{{--	<div class="form-group">
{{ Form::label('region', 'region')}}
{{ Form::checkbox('region',1)}}
</div>
--}}


<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
	{{ Form::label('idregion','Region') }}
	{{ Form::checkbox('chkregion',1)}}
	<div class="controls">
		{{ Form::select('idregion', $regiones,null, array('class' => 'form-control upper')) }}
	</div>
</div>
<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
	{{ Form::label('iddistrito','Distrito') }}
	{{ Form::checkbox('chkdistrito',1)}}
	<div class="controls">
		{{ Form::select('iddistrito', $distritos,null, array('class' => 'form-control upper')) }}
	</div>
</div>

<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
	{{ Form::label('idmunicipio','Municipio') }}
	{{ Form::checkbox('chkmunicipio',1)}}
	<div class="controls">
		{{ Form::select('idmunicipio', $municipios,null, array('class' => 'form-control upper')) }}
	</div>
</div>

<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
	{{ Form::label('idlocalidad','Localidad') }}
	{{ Form::checkbox('chklocalidad',1)}}
	<div class="controls">
		{{ Form::select('idlocalidad', $localidades,null, array('class' => 'form-control upper')) }}
	</div>
</div>

<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
	{{ Form::label('','Buscar') }}
	<div class="controls">
		<button id="findreporte" type="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
		</button>
		{{--<a href="{{ URL::to('reportes/pdfobrasaut') }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>--}}
	</div>
</div>


</div>

{{ Form::close() }}

