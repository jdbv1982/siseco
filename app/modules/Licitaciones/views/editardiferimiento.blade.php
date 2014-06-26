<div class="well col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">
    <h2 class="text-center">Editar Diferimiento</h2>
    {{ Form::model($diferimiento, array('url'=> array('licitaciones/editardiferimiento', $diferimiento->id),'method'=>'POST')) }}
    @include('layouts/errores')
    <div class="row">
	<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('numdiferimiento','Numero de Diferimiento') }}
                        <div class="controls">
                            {{ Form::text('numdiferimiento',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('fechadiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('fechadiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('cantidad','Cantidad') }}
                        <div class="controls">
                            {{ Form::text('cantidad',null,array('class'=>'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('finiciodiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('finiciodiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {{ Form::label('ffinaldiferimiento','Fecha') }}
                        <div class="controls">
                            {{ Form::text('ffinaldiferimiento',null,array('class'=>'form-control fecha', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    {{ Form::label('observ_diferimiento','Observaciones') }}
                    <div class="controls">
                        {{ Form::textarea('observ_diferimiento', null, array('class'=>'form-control','rows'=>'3') ) }}
                    </div>
                </div>
    </div>
    <br>
    <div class="form-group ">
        {{ Form::submit('Guardar',array('class'=>'btn btn-success col-xs-4 col-xs-offset-1')) }}
        <a href="{{ URL::to('licitaciones/nuevo',$diferimiento->idobra) }}" class="btn btn-warning col-xs-4 col-xs-offset-1">Cancelar</a>
    </div>
    {{ Form::close() }}
</div>
