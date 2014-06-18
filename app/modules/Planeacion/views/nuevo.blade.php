<div class="col-xs-10 col-xs-offset-1">


{{ Form::open(array('url'=>'planeacion/nuevo', 'method'=>'POST','class'=>'form-inline')) }}
<input type="hidden" id="_nivel" value="0">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
        <a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <legend>Datos Generales</legend>
        <div class="form-group col-xs-12 col-sm-2">
                {{ Form::label('status_id','Estatus de la Obra') }}
                <div class="controls">
                    {{ Form::select('status_id', $status_id,null, array('class' => 'form-control upper')) }}
                </div>
            </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('nombreoficio','Nombre del Oficio') }}
            <div class="controls">
                {{ Form::text('nombreoficio','AUTORIZACION',array('class'=>'form-control', 'required', 'readonly')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3">
            {{ Form::label('numerooficio','Numero de Oficio') }}
            <div class="controls">
                {{ Form::text('numerooficio',null,array('class'=>'form-control upper', 'required','autofocus')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('fechaoficio','Fecha') }}
            <div class="controls">
                {{ Form::text('fechaoficio',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('fecharecibido','Recibido por la Dependencia') }}
            <div class="controls">
                {{ Form::text('fecharecibido',null,array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('ppi','PPI') }}
            <div class="controls">
                {{ Form::text('ppi',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
            {{ Form::label('nombreppi', 'Nombe de PPI') }}
            <div class="controls">
                {{ Form::text('nombreppi',null,array('class'=>'form-control')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Datos Geograficos</legend>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idregion','Region') }}
                <div class="controls">
                    {{ Form::select('idregion', $regiones,null, array('class' => 'form-control upper')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('iddistrito','Distrito') }}
                <div class="controls">
                    {{ Form::select('iddistrito', $distritos,null, array('class' => 'form-control upper')) }}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idmunicipio','Municipio') }}
                <div class="controls">
                    {{ Form::select('idmunicipio', $municipios,null, array('class' => 'form-control upper')) }}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idlocalidad','Localidad') }}
                <div class="controls">
                    {{ Form::select('idlocalidad', $localidades,null, array('class' => 'form-control upper')) }}
                </div>
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Datos de la Obra - Identificación</legend>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idfuente','Fuente') }}
            <div class="controls">
                {{ Form::select('idfuente',$fuentes, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsubfuente','SubFuente') }}
            <div class="controls">
                {{ Form::select('idsubfuente',$subfuentes, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idorigen','Origen') }}
            <div class="controls">
                {{ Form::select('idorigen',$origen, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsuborigen','SubOrigen') }}
            <div class="controls">
                {{ Form::select('idsuborigen',$suborigen, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idclassuborigen','Clasificacion Suborigen') }}
            <div class="controls">
                {{ Form::select('idclassuborigen',$clasificacion, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idcvefin','Cve Financiamiento') }}
            <div class="controls">
                {{ Form::select('idcvefin',$financiamiento, null,array('class'=>'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('ejercicio', 'Ejercicio') }}
            <div class="controls">
                {{ Form::text('ejercicio',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('depejecutora', 'Dependencia Ejecutora') }}
            <div class="controls">
                {{ Form::text('depejecutora','401001 CAMINOS Y AEROPISTAS DE OAXACA',array('class'=>'form-control','readonly')) }}
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idprograma','Programa') }}
            <div class="controls">
                {{ Form::select('idprograma', $programa,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsubprograma','Sub-Programa') }}
            <div class="controls">
                {{ Form::select('idsubprograma', $subprograma,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idtipo','Tipo') }}
            <div class="controls">
                {{ Form::select('idtipo', $tipoprograma,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsituacion','Situacion de la Obra') }}
            <div class="conrols">
                {{ Form::select('idsituacion', $situacion,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3">
            {{ Form::label('idmodalidad', 'Modalidad de Ejecucion') }}
            <div class="controls">
                {{ Form::select('idmodalidad', $modalidad,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3">
            {{ Form::label('numeroobra', 'Numero de Obra') }}
            <div class="controls">
                {{ Form::text('numeroobra',null,array('class'=>'form-control', 'required')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('idfgeneral', 'Fuente General') }}
            <div class="controls">
                {{ Form::select('idfgeneral', $fgeneral,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('tipo_obra_id', 'Tipo de Obra') }}
            <div class="controls">
                {{ Form::select('tipo_obra_id', $tipos_obra,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2">
            {{ Form::label('tipo_atn_id', 'Tipo de Atencion') }}
            <div class="controls">
                {{ Form::select('tipo_atn_id', $tipo_atencion,null, array('class' => 'form-control upper')) }}
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::label('nombreobra','Nombre de la Obra') }}
            <div class="controls">
                {{ Form::textarea('nombreobra', null, array('class'=>'form-control','rows'=>'3','required') ) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Estructura Financiera</legend>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::label('nombreaccion', 'Nombre de la Accion') }}
            <div class="controls">
                {{ Form::text('nombreaccion',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <a href="#" id="unconcepto" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></a>
            <a href="#" id="versumas" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></a>
            <table class="table table-bordered" id="estructura">
                <thead>
                    <th>Concepto</th>
                    <th>Total</th>
                    <th>Federal</th>
                    <th>Estatal</th>
                    <th>Municipal</th>
                    <th>Participantes</th>
                </thead>
                <tbody id="estructurabody">
                    <tr id="fila">
                        <td class="col-lg-1">{{ Form::text('concepto[]',null,array('class'=>'form-control','id'=>'totcostoinv','required')) }}</td>
                        <td class="col-lg-1">{{ Form::text('total[]','0.00',array('class'=>'form-control',)) }}</td>
                        <td class="col-lg-1">{{ Form::text('invfederal[]','0.00',array('class'=>'form-control vertical1' )) }}</td>
                        <td class="col-lg-1">{{ Form::text('investatal[]','0.00',array('class'=>'form-control vertical1')) }}</td>
                        <td class="col-lg-1">{{ Form::text('invmunicipal[]','0.00',array('class'=>'form-control vertical1')) }}</td>
                        <td class="col-lg-1">{{ Form::text('invparticipantes[]','0.00',array('class'=>'form-control vertical1')) }}</td>
                    </tr>
                </tbody>
            </table>
    </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Metas</legend>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('idunidadmedida','Unidad de Medida') }}
            <div class="controls">
                {{ Form::select('idunidadmedida', $medidas,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('idmeta','Tipo') }}
            <div class="controls">
                {{ Form::select('idmeta', $metas,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('cantidad', 'Cantidad') }}
            <div class="controls">
                {{ Form::text('cantidad',null,array('class'=>'form-control')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Beneficiarios</legend>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('idpoblacion','Tipo') }}
            <div class="controls">
                {{ Form::select('idpoblacion', $tpoblacion,null, array('class' => 'form-control upper')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
            {{ Form::label('btotales', 'Total') }}
            <div class="controls">
                {{ Form::text('btotales',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
            {{ Form::label('bmujeres', 'Mujeres') }}
            <div class="controls">
                {{ Form::text('bmujeres',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
            {{ Form::label('bhombres', 'Hombres') }}
            <div class="controls">
                {{ Form::text('bhombres',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
            {{ Form::label('bjornales', 'Jornales') }}
            <div class="controls">
                {{ Form::text('bjornales',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::label('caracteristicas', 'Caracteristicas Generales') }}
            <div class="controls">
                {{ Form::textarea('caracteristicas', null, array('class'=>'form-control','rows'=>'3') ) }}
            </div>
        </div>

    </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Calendarizacion de Recursos</legend>
        <a href="#" id="otrocalendario" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></a>
        <a href="#" id="versumascal" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></a>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
        <table class="table table-bordered" id="tblcal">
            <thead>
                <th>Concepto</th>
                <th>%</th>
                <th>Pesos</th>
                <th>ENE</th>
                <th>FEB</th>
                <th>MAR</th>
                <th>ABR</th>
                <th>MAY</th>
                <th>JUN</th>
                <th>JUL</th>
                <th>AGO</th>
                <th>SEP</th>
                <th>OCT</th>
                <th>NOV</th>
                <th>DIC</th>
            </thead>
            <tbody id="bodycal">
                <tr id="filacal">
                        <td >{{ Form::text('conceptocal[]',null,array('class'=>'form-control nombrecal','required')) }}</td>
                        <td >{{ Form::text('porcentaje[]','0.00',array('class'=>'form-control')) }}</td>
                        <td >{{ Form::text('totalcal[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('enero[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('febrero[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('marzo[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('abril[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('mayo[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('junio[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('julio[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('agosto[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('septiembre[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('octubre[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('noviembre[]','0.00',array('class'=>'form-control montocal')) }}</td>
                    <td >{{ Form::text('diciembre[]','0.00',array('class'=>'form-control montocal')) }}</td>
                </tr>
            </tbody>


        </table>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Seguimiento</legend>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('comentarios','Comentarios') }}
            <div class="controls">
                {{ Form::textarea('comentarios', null, array('class'=>'form-control','rows'=>'3') ) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('concejecutar','Conceptos a Ejecutar') }}
            <div class="controls">
                {{ Form::textarea('concejecutar', null, array('class'=>'form-control','rows'=>'3') ) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('observaciones','Observaciones') }}
            <div class="controls">
                {{ Form::textarea('observaciones', null, array('class'=>'form-control','rows'=>'3') ) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('codigoaccion', 'Codigo de Accion') }}
            <div class="controls">
                {{ Form::text('codigoaccion',null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('observacionesseg','Observaciones Seguimiento') }}
            <div class="controls">
                {{ Form::textarea('observacionesseg', null, array('class'=>'form-control','rows'=>'3') ) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('ninforme', 'Numero de Informe') }}
            <div class="controls">
                {{ Form::text('ninforme',null,array('class'=>'form-control')) }}
            </div>
        </div>
    </div>


<br>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
        <a href="{{ URL::to('inicio') }}" class="btn btn-primary">Cancelar</a>
    </div>


{{ Form::close() }}

</div>
