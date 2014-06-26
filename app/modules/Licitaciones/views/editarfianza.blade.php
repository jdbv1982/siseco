<div class="well col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">
    <h2 class="text-center">Editar Convenio</h2>
    {{ Form::model($fianza, array('url'=> array('licitaciones/editarfianza', $fianza->id),'method'=>'POST')) }}
    @include('layouts/errores')
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
                {{ Form::text('fechafianza',null,array('class'=>'form-control fecha', 'required')) }}
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
            {{ Form::label('tipofianza','Tipo') }}
            <div class="controls">
                {{ Form::select('tipofianza',$tfianza, null,array('class'=>'form-control')) }}
            </div>
        </div>
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
    <br>
    <div class="form-group ">
        {{ Form::submit('Guardar',array('class'=>'btn btn-success col-xs-4 col-xs-offset-1')) }}
        <a href="{{ URL::to('licitaciones/nuevo',$fianza->idobra) }}" class="btn btn-warning col-xs-4 col-xs-offset-1">Cancelar</a>
    </div>
    {{ Form::close() }}
</div>
