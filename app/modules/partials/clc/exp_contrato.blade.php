<h3 class="text-center">RELACIÓN DE DOCUMENTOS QUE INTEGRAN LA ESTIMACIÓN</h3>

{{ Form::open(array('url'=> array('clc/update',$obraclc->id),'method'=>'POST')) }}
{{Form::hidden('clc_id',$obraclc->id )}}
<div class="row col-sm-8 col-sm-offset-2">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Presenta</th>
			<th>Faltante</th>
			<th>No aplica</th>
			<th>Observaciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($documentos as $d)
		<tr>
			<td>{{ $d->id }}</td>
			<td>{{ $d->documento }}</td>
			<td>{{ Form::radio('radio'.$d->id,1,$d->presenta,array('class' => 'radio1'))}}</td>
			<td>{{ Form::radio('radio'.$d->id,2,$d->faltante,array('class' => 'radio1'))}}</td>
			<td>{{ Form::radio('radio'.$d->id,3,$d->no_aplica,array('class' => 'radio1'))}}</td>
			<td>{{ Form::textarea('obs'.$d->id,$d->observaciones, ['class'=>'form-control', 'rows'=>'2']) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
<div class="row col-sm-12 col-sm-offset-2">
	<button type="submit" class="btn btn-default">
		<span class="glyphicon glyphicon-floppy-saved"></span>
	</button>
	<a class="btn btn-default" href="{{ URL::to('clc/listado') }}">
                <span class="glyphicon glyphicon-floppy-remove"></span>
            </a>
</div>


{{Form::close()}}
