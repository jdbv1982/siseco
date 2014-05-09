<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<legend align="left">Planeacion</legend>
        <dl>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Oficio de Autorizacion</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $oficio->numerooficio }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Fecha de Autorizacion</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $oficio->fechaoficio | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Numero de Obra</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $planeacion->numeroobra | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Descripcion</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $planeacion->nombreobra | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Caracteristicas</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $planeacion->caracteristicas | "" }}</dd>
        </dl>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p class="text-right">
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 25) == 'true')
                <a class="btn btn-primary" href="{{ URL::to('planeacion/editar/'.$planeacion->id) }}"><span class="glyphicon glyphicon-pencilxx">Editar</span></a>            
            @endif
            {{--<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencilxx">Detalles</span></a>--}}
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 26) == 'true')
                <a class="btn btn-primary" href="{{ URL::to('documentacion/nuevo/'.$planeacion->id) }}"><span class="glyphicon glyphicon-pencilxx">Documentacion</span></a>
            @endif
        </p>
        </div>
    </div>


  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <legend align="left">Licitaciones</legend>
            @if($licitaciones)
        <dl>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Procedimiento</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ isset($licitaciones->l_procedimiento) ? $licitaciones->l_procedimiento : ' '}}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Modalidad</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ isset($licitaciones->l_modcontrato) ? $licitaciones->l_modcontrato : ''}}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Contrato</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $licitaciones->l_contrato}}</dd>
            <br>            
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Contratado ( $ )</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ $licitaciones->l_montocontratado | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Anticipo</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ $licitaciones->l_anticipo | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">F. Contrato</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $licitaciones->l_fecha | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">F. Inicio</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $licitaciones->l_finicio | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">F. Termino</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $licitaciones->l_ffinal | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Plazo en dias</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $licitaciones->l_ndias}}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Empresa</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $empresa->razsoc | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Tipo Empresa</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $tipoempresa | "" }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">cmic</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $cmic | "" }}</dd>        


      </dl>
            @endif
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <p class="text-right">
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 27) == 'true')
                <a class="btn btn-primary" href="{{ URL::to('licitaciones/nuevo/'.$planeacion->id) }}"><span class="glyphicon glyphicon-pencilxx">Editar</span></a>            
            @endif
                {{--<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencilxx">Detalles</span></a>--}}
            </p>
        </div>
	</div>
</div>



<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<legend align="left">Obras</legend>
         <dl>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">POA</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ isset($obras->poa) ? $obras->poa : ''}}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Observaciones</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ isset($obras->observaciones) ? $obras->observaciones : '' }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Avance Fisico</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ isset($avances->afisico) ? $avances->afisico : '' }}</dd>
            <br>
            <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Avance Financiero</dt>
            <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ isset($avances->afinanciero) ? $avances->afinanciero : '' }}</dd>
            <br>
        </dl>
        @if(Auth::user()->verificaPermiso(Auth::user()->id, 28) == 'true')
		  <a class="btn btn-primary" href="{{ URL::to('obras/nuevo/'.$planeacion->id) }}"><span class="glyphicon glyphicon-pencilxx">Editar</span></a>            
        @endif
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <legend align="left">Administracion</legend>
        @if($administracion)
        <dl>
        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Avance Financiero</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ $administracion->a_afinanciero | ""}}</dd>

        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">No. CLC</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $administracion->a_numclc | "-" }}</dd>
        
        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Fecha</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $administracion->a_fecha | "" }}</dd>

        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Enviado a SEFIN</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $administracion->a_fsefin | "" }}</dd>

        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Anticipo</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8 moneda">{{ $administracion->a_ant | "" }}</dd>

        <dt class="col-xs-12 col-sm-4 col-md-5 col-lg-4">Observaciones</dt>
        <dd class="col-xs-12 col-sm-8 col-md-7 col-lg-8">{{ $administracion->a_obsrv | "" }}</dd>

      </dl>
		@endif
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <p class="text-right">
            @if(Auth::user()->verificaPermiso(Auth::user()->id, 29) == 'true')
                <a class="btn btn-primary" href="{{ URL::to('administracion/listado/'.$planeacion->id) }}"><span class="glyphicon glyphicon-pencilxx">Editar</span></a>            
            @endif
                {{--<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencilxx">Detalles</span></a>--}}
            </p>
        </div>
	</div>
</div>
