{{ Form::model($obra, array('url'=> array('planeacion/editar', $obra->id),'method'=>'POST', 'class'=>'target')) }}
<input type="hidden" id="_nivel" value="1">


<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
        <a href="{{ URL::previous() }}" class="btn btn-primary">Cancelar</a>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <legend>Datos Generales</legend>
        @if (Auth::user()->idPerfil > 4)
            <a href="#" id="masoficio" data-toggle="modal" data-target="#autorizar" class="btn btn-primary"> + </a>
        @endif

        <table cellpadding="0" cellspacing="0" border="0" id="tboficios" class="datatable table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Recibido</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($oficios as $oficio)
                <tr>
                    <td>{{ $oficio->nombreoficio }}</td>
                    <td>{{ $oficio->numerooficio }}</td>
                    <td>{{ date("d/m/Y",strtotime($oficio->fechaoficio)) }}</td>
                    <td>{{ date("d/m/Y",strtotime($oficio->fecharecibido)) }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('ppi','PPI') }}
            <div class="controls">
                {{ Form::text('ppi',null,array('class'=>'form-control', 'required')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-9 col-md-9 col-lg-9">
            {{ Form::label('nombreppi', 'Nombe de PPI') }}
            <div class="controls">
                {{ Form::text('nombreppi',null,array('class'=>'form-control', 'required')) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Datos Geograficos</legend>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idregion','Region') }}
                <div class="controls">
                    {{ Form::select('idregion', $regiones,null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('iddistrito','Distrito') }}
                <div class="controls">
                    {{ Form::select('iddistrito', $distritos,null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idmunicipio','Municipio') }}
                <div class="controls">
                    {{ Form::select('idmunicipio', $municipios,null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('idlocalidad','Localidad') }}
                <div class="controls">
                    {{ Form::select('idlocalidad', $localidades,null, array('class' => 'form-control')) }}
                </div>
            </div>
    </div>
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <legend>Datos de la Obra - Identificaion</legend>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idfuente','Fuente') }}
            <div class="controls">
                {{ Form::select('idfuente',$fuentes, null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsubfuente','SubFuente') }}
            <div class="controls">
                {{ Form::select('idsubfuente',$subfuentes, null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idorigen','Origen') }}
            <div class="controls">
                {{ Form::select('idorigen',$origen, null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsuborigen','SubOrigen') }}
            <div class="controls">
                {{ Form::select('idsuborigen',$suborigen, null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idclassuborigen','Clasificacion Suborigen') }}
            <div class="controls">
                {{ Form::select('idclassuborigen',$clasificacion, null,array('class'=>'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idcvefin','Cve Financiamiento') }}
            <div class="controls">
                {{ Form::select('idcvefin',$financiamiento, null,array('class'=>'form-control')) }}
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
                {{ Form::select('idprograma', $programa,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsubprograma','Sub-Programa') }}
            <div class="controls">
                {{ Form::select('idsubprograma', $subprograma,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idtipo','Tipo') }}
            <div class="controls">
                {{ Form::select('idtipo', $tipoprograma,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idsituacion','Situacion de la Obra') }}
            <div class="conrols">
                {{ Form::select('idsituacion', $situacion,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idmodalidad', 'Modalidad de Ejecucion') }}
            <div class="controls">
                {{ Form::select('idmodalidad', $modalidad,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('numeroobra', 'Numero de Obra') }}
            <div class="controls">
                {{ Form::text('numeroobra',null,array('class'=>'form-control', 'required')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('idfgeneral', 'Fuente General') }}
            <div class="controls">
                {{ Form::select('idfgeneral', $fgeneral,null, array('class' => 'form-control')) }}
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
            <a href="#" id="unconcepto" class="btn btn-primary"> + </a>
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
               @foreach ($estructura as $est_fin)
                    <tr id="fila">
                        <td class="col-lg-1">{{ Form::text('concepto[]',$est_fin->concepto,array('class'=>'form-control','id'=>'totcostoinv','required')) }}</td>
                        <td class="col-lg-1">{{ Form::text('total[]',$est_fin->total,array('class'=>'form-control',)) }}</td>
                        <td class="col-lg-1">{{ Form::text('invfederal[]',$est_fin->invfederal,array('class'=>'form-control vertical1' )) }}</td>
                        <td class="col-lg-1">{{ Form::text('investatal[]',$est_fin->investatal,array('class'=>'form-control vertical1')) }}</td>
                        <td class="col-lg-1">{{ Form::text('invmunicipal[]',$est_fin->invmunicipal,array('class'=>'form-control vertical1')) }}</td>
                        <td class="col-lg-1">{{ Form::text('invparticipantes[]',$est_fin->invparticipantes,array('class'=>'form-control vertical1')) }}</td>
                    </tr>
                     @endforeach
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
                {{ Form::select('idunidadmedida', $medidas,null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
            {{ Form::label('idmeta','Tipo') }}
            <div class="controls">
                {{ Form::select('idmeta', $metas,null, array('class' => 'form-control')) }}
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
                {{ Form::select('idpoblacion', $tpoblacion,null, array('class' => 'form-control')) }}
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
        <table class="table table-bordered">
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
            <tbody>
                @foreach ($calen as $calendario)
                <tr>
                    <td >{{ Form::text('',$calendario->conceptocal,array('class'=>'form-control','required')) }}</td>
                    <td >{{ Form::text('',$calendario->porcentaje,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->totalcal,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->enero,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->febrero,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->marzo,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->abril,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->mayo,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->junio,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->julio,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->agosto,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->septiembre,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->octubre,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->noviembre,array('class'=>'form-control')) }}</td>
                    <td >{{ Form::text('',$calendario->diciembre,array('class'=>'form-control')) }}</td>
                </tr>
                @endforeach
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
        <a href="{{ URL::previous() }}" class="btn btn-primary">Cancelar</a>
    </div>

{{ Form::close() }}

<!-- Modal -->
{{ Form::open(array('url'=> array('agregaoficio', $obra->id),'method'=>'POST','id'=>'idoficio')) }}
<input type="hidden" id="idobra" name="idobra" value="{{ $obra->id}}">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Oficio</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('nombreoficio','Nombre del Oficio') }}
                        <div class="controls">
                            {{ Form::text('nombreoficio',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numerooficio','Numero de Oficio') }}
                        <div class="controls">
                            {{ Form::text('numerooficio',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fechaoficio','Fecha') }}
                        <div class="controls">
                            {{ Form::text('fechaoficio','0000-00-00',array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fecharecibido','Recibido por la Dependencia') }}
                        <div class="controls">
                            {{ Form::text('fecharecibido','0000-00-00',array('class'=>'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {{ Form::label('observacionesoficio','Observaciones del Oficio') }}
                        <div class="controls">
                            {{ Form::textarea('observacionesoficio', null, array('class'=>'form-control','rows'=>'3','required') ) }}
                        </div>
                    </div>
                    <br>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {{ Form::label('nombreobra','Nombre de la Obra') }}
                        <div class="controls">
                            {{ Form::textarea('nombreobra', null, array('class'=>'form-control','rows'=>'3','required') ) }}
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('metaproyecto', 'Meta del Proyecto') }}
                        <div class="controls">
                            {{ Form::text('metaproyecto',null,array('class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('idmodalidad', 'Modalidad de Ejecucion') }}
                        <div class="controls">
                            {{ Form::select('idmodalidad', $modalidad,null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('efin', 'Estructura Financiera')}}
                        <div class="controls">
                        {{ Form::checkbox('efin',1) }}
                    </div>
                    </div>

                    <div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12 oculto" id="estfin">
                        <div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <br>
                            <a href="#" id="unconceptoedit" class="btn btn-primary"> + </a>
                            <table class="table table-bordered" id="estructurafin">
                                <thead>
                                    <th>Concepto</th>
                                    <th>Total</th>
                                    <th>Federal</th>
                                    <th>Estatal</th>
                                    <th>Municipal</th>
                                    <th>Participantes</th>
                                </thead>
                                <tbody id="estructurabodyedit">
                                    <tr id="filaedit">
                                        <td class="col-lg-1">{{ Form::text('concepto[]',null,array('class'=>'form-control','id'=>'totcostoinv','required')) }}</td>
                                        <td class="col-lg-1">{{ Form::text('total[]','0.00',array('class'=>'form-control',)) }}</td>
                                        <td class="col-lg-1">{{ Form::text('invfederal[]','0.00',array('class'=>'form-control' )) }}</td>
                                        <td class="col-lg-1">{{ Form::text('investatal[]','0.00',array('class'=>'form-control')) }}</td>
                                        <td class="col-lg-1">{{ Form::text('invmunicipal[]','0.00',array('class'=>'form-control')) }}</td>
                                        <td class="col-lg-1">{{ Form::text('invparticipantes[]','0.00',array('class'=>'form-control')) }}</td>
                                    </tr>
                                </tbody>
                            </table>
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

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnmodal" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}



{{ Form::open(array('url'=> array('agregaoficio', $obra->id),'method'=>'POST','id'=>'verautorizacion')) }}
<div class="modal fade" id="autorizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Autorizacion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" id="usuario" name="usuario" value="{{Auth::user()->email}}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="pass" name="pass" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnautorizar" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
