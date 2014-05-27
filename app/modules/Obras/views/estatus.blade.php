<div class="col-xs-8 col-xs-offset-2">
<h3>Resumen de la Obra</h3>

	<div class="alert alert-success alert-dismissable alerta oculto">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong>Correcto!</strong> Datos agregados a la obra.
	</div>
	<table class="table">
		<tbody>
			<tr>
				<td class="col-lg-1"><strong>PPI</strong></td>
				<td colspan="2" class="upper col-lg-5">{{ isset($planeacion[0]->ppi) ? $planeacion[0]->ppi : '' }}</td>
				<td class="col-lg-1"><strong>Nombre</strong></td>
				<td colspan="6" class="upper col-lg-5">{{ isset($planeacion[0]->nombreppi) ? $planeacion[0]->nombreppi : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Numero de Obra</strong></td>
				<td colspan="2" class="upper col-lg-5">{{ isset($planeacion[0]->numeroobra) ? $planeacion[0]->numeroobra : '' }}</td>
				<td class="col-lg-1"><strong>Nombre de Obra</strong></td>
				<td colspan="6" class="upper col-lg-5">{{ isset($planeacion[0]->nombreobra) ? $planeacion[0]->nombreobra : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Codigo de Acción</strong></td>
				<td id="codigoaccionok" colspan="2" class="upper col-lg-5">{{ isset($planeacion[0]->codigoaccion) ? $planeacion[0]->codigoaccion : '' }}</td>
				<td class="col-lg-1"><strong>Caracteristicás</strong></td>
				<td colspan="6" class="upper col-lg-5">{{ isset($planeacion[0]->caracteristicas) ? $planeacion[0]->caracteristicas : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Region</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombre_region) ? $planeacion[0]->nombre_region : '' }}</td>
				<td class="col-lg-1"><strong>Distrito</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombre_distrito) ? $planeacion[0]->nombre_distrito : '' }}</td>
				<td class="col-lg-1"><strong>Municipio</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombre_municipio) ? $planeacion[0]->nombre_municipio : '' }}</td>
				<td class="col-lg-1"><strong>Localidad</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombre_localidad) ? $planeacion[0]->nombre_localidad : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Programa</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombreprograma) ? $planeacion[0]->nombreprograma : '' }}</td>
				<td class="col-lg-1"><strong>Subprograma</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombresubprograma) ? $planeacion[0]->nombresubprograma : '' }}</td>
				<td class="col-lg-1"><strong>Tipo</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombretipo) ? $planeacion[0]->nombretipo : '' }}</td>
				<td class="col-lg-1"><strong>Fuente</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombre_fuente) ? $planeacion[0]->nombre_fuente : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Sub-fuente</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombresubfuente) ? $planeacion[0]->nombresubfuente : '' }}</td>
				<td class="col-lg-1"><strong>Origen</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombreorigen) ? $planeacion[0]->nombreorigen : '' }}</td>
				<td class="col-lg-1"><strong>Clasificacion</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombreclasificacion) ? $planeacion[0]->nombreclasificacion : '' }}</td>
				<td class="col-lg-1"><strong>Financiamiento</strong></td>
				<td class="upper col-lg-2">{{ isset($planeacion[0]->nombrefinanciamiento) ? $planeacion[0]->nombrefinanciamiento : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Modalidad</strong></td>
				<td colspan="2" class="upper col-lg-2">{{ isset($planeacion[0]->nombremodalidad) ? $planeacion[0]->nombremodalidad : '' }}</td>
				<td class="col-lg-1"><strong>Fuente General</strong></td>
				<td colspan="6" class="upper col-lg-2">{{ isset($planeacion[0]->fuentegeneral) ? $planeacion[0]->fuentegeneral : '' }}</td>
			</tr>
			<br>
			<tr>
				<td class="col-lg-1"><strong>Comentarios</strong></td>
				<td id="comentariosok" colspan="3" class="upper col-lg-5">{{ isset($planeacion[0]->comentarios) ? $planeacion[0]->comentarios : '' }}</td>
				<td class="col-lg-1"><strong>Conceptos a Ejecutar</strong></td>
				<td id="concejecutarok" colspan="3" class="upper col-lg-5">{{ isset($planeacion[0]->concejecutar) ? $planeacion[0]->concejecutar : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Observaciones</strong></td>
				<td id="observacionesok" colspan="3" class="upper col-lg-5">{{ isset($planeacion[0]->observaciones) ? $planeacion[0]->observaciones : '' }}</td>
				<td class="col-lg-1"><strong>Observaciones Seguimiento</strong></td>
				<td id="observacionessegok" colspan="3" class="upper col-lg-5">{{ isset($planeacion[0]->observacionesseg) ? $planeacion[0]->observacionesseg : '' }}</td>
			</tr>
			<tr>
				<td class="col-lg-1"><strong>Residencia</strong></td>
				<td id="residenciaok" class="upper col-lg-5">{{ isset($planeacion[0]->residencia) ? $planeacion[0]->residencia : '' }}</td>
			</tr>
		</tbody>
	</table>




<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
@if(Auth::user()->verificaPermiso(Auth::user()->id, 38) == 'true')
    <a href="#" data-toggle="modal" data-target="#seguimiento" class="btn btn-primary">Seguimiento</a>
@endif
@if(Auth::user()->verificaPermiso(Auth::user()->id, 39) == 'true')
    <a href="#" data-toggle="modal" data-target="#residencia" class="btn btn-primary">Residencia</a>
@endif
    <a href="{{ URL::previous() }}" class="btn btn-primary">Cancelar</a>
</div>


</div>


@include('seguimiento')
@include('residencia')
