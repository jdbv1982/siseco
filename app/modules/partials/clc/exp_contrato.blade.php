<h3 class="text-center">RELACIÓN DE DOCUMENTOS QUE INTEGRAN LA ESTIMACIÓN</h3>

{{ Form::open(array('url'=> array('clc/update',$obraclc->id),'method'=>'POST')) }}
<div class="row col-sm-8 col-sm-offset-2">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Presenta</th>
			<th>No aplica</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($documentos as $d)
		<tr>
			<td>{{ $d->id }}</td>
			<td>{{ $d->documento }}</td>
			<td>{{ Form::radio($d->id,$d->presenta,array('class' => 'radio1'))}}</td>
			<td>{{ Form::radio($d->id,$d->faltante,array('class' => 'radio1'))}}</td>
			<td>{{ Form::radio($d->id,$d->no_aplica,array('class' => 'radio1'))}}</td>

			{{--Form::radio($name, $value, $checked, $attributes);--}}
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
