<div class="col-xs-10 col-xs-offset-1">
{{ Form::open(array('url'=> array('obras/nuevo', $obra[0]->id),'method'=>'POST', 'class'=>'target')) }}
  <input type="hidden" name="id" id="id" value="{{ $obra[0]->id }}">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
    <a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
</div>

<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<br>
	<legend>Datos de la Obra</legend>
	<div class="form-group col-xs-12 col-sm-1 col-md-1 col-lg-1">
		{{ Form::label('poa','POA:') }}
		<div class="controls">
			{{ Form::text('poa',null,array('class'=>'form-control','required')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
		{{ Form::label('idevento','Evento:') }}
		<div class="input-group">
			{{ Form::select('idevento',$evento,null,array('class'=>'form-control col-xs-12 col-sm-3 col-md-3 col-lg-3')) }}
			<span class="input-group-btn">
                <a href="#" id="addevento" data-toggle="modal" data-target="#formevento" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
            </span>
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
		{{ Form::label('l_contrato','Contrato:') }}
		<div class="controls">
			{{ Form::text('l_contrato',$obra[0]->l_contrato,array('class'=>'form-control', 'readonly','disabled')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
		{{ Form::label('l_fecha','Firma de Contrato:') }}
		<div class="controls">
			{{ Form::text('l_fecha',$obra[0]->l_fecha,array('class'=>'form-control', 'readonly','disabled')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
		{{ Form::label('residencia','Residencia:') }}
		<div class="controls">
			{{ Form::text('residencia',$obra[0]->nombreresidencia,array('class'=>'form-control','readonly','disabled')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('nombreobra','Nombre de la Obra:') }}
		<div class="controls">
			{{ Form::textarea('nombreobra',$obra[0]->nombreobra,array('class'=>'form-control','rows'=>'2', 'readonly')) }}
		</div>
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('razsoc','Empresa:') }}
		<div class="controls">
			{{ Form::text('razsoc',$obra[0]->razsoc,array('class'=>'form-control','rows'=>'3', 'readonly')) }}
		</div>
	</div>
</div>
<div class="row col-xs-12 col-sm-4 col-md-4 col-lg-4">
	<br>
	<legend>Montos</legend>
	<div class="form-group">
		{{ Form::label('aut','Autorizado:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('aut',$obra[0]->autorizado,array('class'=>'form-control text-right','disabled')) }}
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('contratado','Contratado:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('contratado',$obra[0]->l_montocontratado,array('class'=>'form-control text-right','disabled')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('convenio','Convenio:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('convenio',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('total','Total:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('total',$obra[0]->l_montocontratado,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('pagado','Pagado:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('pagado',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('noejecutado','No Ejecutado:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('noejecutado',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
</div>
<div class="row col-xs-12 col-sm-4 col-md-4 col-lg-4">
	<br>
	<legend>Montos</legend>
	<div class="form-group">
		{{ Form::label('aut_ini','Aut. Inicial:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('aut_ini',$obra[0]->autorizado,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('','', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('contratado',$obra[0]->l_montocontratado,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('plazos','PLAZOS', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center')) }}
		{{ Form::label('plazos','INICIAL', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center')) }}
		{{ Form::label('plazos','FINAL', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center')) }}
	</div>
	<div class="form-group">
		{{ Form::label('contrato','Contrato:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('contrato',$obra[0]->l_finicio,array('class'=>'form-control text-right','readonly','disabled')) }}
		</div>
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('contrato',$obra[0]->l_ffinal,array('class'=>'form-control text-right','readonly','disabled')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('diferimiento','Diferimiento:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('diferimiento',null,array('class'=>'form-control text-right')) }}
		</div>
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('diferimiento',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('convenio','Convenio:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('convenio',null,array('class'=>'form-control text-right')) }}
		</div>
		<div class="controls col-xs-12 col-sm-4 col-md-4 col-lg-4">
			{{ Form::text('convenio',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>

</div>

<div class="row col-xs-12 col-sm-4 col-md-4 col-lg-4">
	<br>
	<legend>Montos</legend>
	<div class="form-group">
		{{ Form::label('','', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('aut_ini',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<br>
	<div class="form-group">
		{{ Form::label('','', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('contratado',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('plazos','ACUERDO RESCISION DE OBRA', array('class'=>'col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center')) }}
	</div>
	<div class="form-group">
		{{ Form::label('numero','Numero:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('numero',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('fecha','Fecha:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('fecha',null,array('class'=>'form-control text-right fecha')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('impcont','Imp Contra:', array('class'=>'col-xs-12 col-sm-4 col-md-4 col-lg-4')) }}
		<div class="controls col-xs-12 col-sm-8 col-md-8 col-lg-8">
			{{ Form::text('impcont',null,array('class'=>'form-control text-right')) }}
		</div>
	</div>

</div>
<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br>
<legend>Avances</legend>
<p>Avance Fisico: <strong>{{isset($avances->afisico) ? $avances->afisico : 0}}</strong></p>
<p>Avance Financiero: <strong>{{isset($avances->afinanciero) ? $avances->afinanciero : 0}}</strong></p>
</div>
<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br>
<legend>Estimaciones
	<a href="#" id="masoficio" data-toggle="modal" data-target="#estimacion" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></a>
</legend>
 <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="col-lg-3 text-center">NOMBRE</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">IMPORTE</th>
            <th class="col-lg-1 text-center">INGRESO A VENTANILLA</th>
            <th class="col-lg-1 text-center">INGRESO A CAO</th>
            <th class="col-lg-1 text-center">INGRESO A SCT</th>
            <th class="col-lg-1 text-center">VALIDO SCT</th>
            <th class="col-lg-1 text-center">INGRESO A BANOBRAS</th>
            <th class="col-lg-1 text-center">DE PAGO</th>
        </tr>
    </thead>
    <tbody id="tbodyest">

    @foreach ($estimaciones as $estimacion)
    <tr>
        <td>{{ $estimacion->nombre }}</td>
        <td class="text-center">{{ $estimacion->clave }}</td>
        <td class="text-right">{{ $estimacion->importe }}</td>
        <td>{{ $estimacion->fecha1 }}</td>
        <td>{{ $estimacion->fecha2 }}</td>
        <td>{{ $estimacion->fecha3 }}</td>
        <td>{{ $estimacion->fecha4 }}</td>
        <td>{{ $estimacion->fecha5 }}</td>
        <td>{{ $estimacion->fecha6 }}</td>
    </tr>
    @endforeach
     </tbody>
  </table>
</div>

<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br>
<legend>Observaciones</legend>
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::label('observaciones','Observaciones:') }}
		<div class="controls">
			{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>

</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
    <a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
</div>

{{ Form::close() }}
</div>


@include('estimacion')
@include('evento')
