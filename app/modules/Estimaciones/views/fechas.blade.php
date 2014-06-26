<div class="col-xs-10 col-xs-offset-1">
<h2>Fechas de la Estimacion</h2>

<p><strong>Numero:</strong>{{$obra->numeroobra}}</p>
<p><strong>Nombre:</strong>{{$obra->nombreobra}}</p>

{{ Form::open(array('url'=> array('estimaciones/fechas', $est->id),'method'=>'POST')) }}
<input type="hidden" id="id" name="id" value="{{ $est->id }}">
 <div class="row">
                    <br>
                     <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha1','Ingreso a Ventanilla') }}
                        <div class="controls">
                            {{ Form::text('fecha1',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha2','Ingreso a CAO') }}
                        <div class="controls">
                            {{ Form::text('fecha2',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha3','Ingreso a SCT') }}
                        <div class="controls">
                            {{ Form::text('fecha3',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha4','Valida SCT') }}
                        <div class="controls">
                            {{ Form::text('fecha4',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha5','Ingreso a BANOBRAS') }}
                        <div class="controls">
                            {{ Form::text('fecha5',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        {{ Form::label('fecha6','De Pago') }}
                        <div class="controls">
                            {{ Form::text('fecha6',null,array('class'=>'form-control fecha')) }}
                        </div>
                    </div>
                </div>



<br>
    <div class="form-group">
        {{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
        <a href="{{ URL::to('estimaciones/listado') }}" class="btn btn-primary">Cancelar</a>
    </div>
{{ Form::close() }}
</div>
