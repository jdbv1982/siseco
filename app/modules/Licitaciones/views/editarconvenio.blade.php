<div class="well col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">
    <h2 class="text-center">Editar Convenio</h2>
    {{ Form::model($conv, array('url'=> array('licitaciones/editarconvenio', $conv->id),'method'=>'POST')) }}
    @include('layouts/errores')
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('numconvenio','Numero de Convenio') }}
                <div class="controls">
                    {{ Form::text('numconvenio',null,array('class'=>'form-control', 'required')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('fechaconvenio','Fecha') }}
                <div class="controls">
                    {{ Form::text('fechaconvenio',null,array('class'=>'form-control fecha', 'required')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('tipoconvenio','Tipo') }}
                <div class="controls">
                    {{ Form::select('tipoconvenio',$tconvenio, null,array('class'=>'form-control')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('cantidad','Cantidad') }}
                <div class="controls">
                    {{ Form::text('cantidad',null,array('class'=>'form-control', 'required')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('finicio','Fecha Inicio') }}
                <div class="controls">
                    {{ Form::text('finicio',null,array('class'=>'form-control fecha', 'required')) }}
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                {{ Form::label('ffinal','Fecha Termino') }}
                <div class="controls">
                    {{ Form::text('ffinal',null,array('class'=>'form-control fecha', 'required')) }}
                </div>
            </div>
        </div>
        <br>
        <div class="form-group ">
            {{ Form::submit('Guardar',array('class'=>'btn btn-success col-xs-4 col-xs-offset-1')) }}
            <a href="{{ URL::to('licitaciones/nuevo',$conv->idobra) }}" class="btn btn-warning col-xs-4 col-xs-offset-1">Cancelar</a>
        </div>
    {{ Form::close() }}
</div>
