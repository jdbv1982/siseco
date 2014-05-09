<div class="col-xs-8 col-xs-offset-2">
@include("layouts/errores")

<h3>Documentacion de la Obra</h3>
<p><strong>Numero: </strong>{{ $obra->numeroobra }}</p>
<p><strong>Nombre: </strong>{{ $obra->nombreobra }}</p>
<br>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		{{ Form::open(array('url'=> array('documentacion/nuevo',$obra->id),'files' =>true,'method'=>'POST','class'=>'form-horizontal')) }}

		<input type="hidden" name="idobra" value="{{ $obra->id }}" >
		<input type="hidden" name="id_usuario" value="{{ Auth::User()->id }}" >


		<div class="form-group">
			{{ Form::label('d_nombredoc', 'Nombre del Archivo') }}
			<div class="controls">
				{{ Form::text('d_nombredoc', null, array('class'=>'form-control')) }}
			</div>

		</div>

		<div class="form-group">
			{{ Form::label('d_urldoc','Archivo') }}
			<div class="controls">
				{{ Form::file('d_urldoc', array('class'=>'form-control')) }}

			</div>
		</div>

		<br>
		<div class="form-group">
			{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
			<a href="{{ URL::to('/inicio') }}" class="btn btn-primary">Cancelar</a>
		</div>

		{{ Form::close() }}

	</div>
</div>
</div>


<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<legend align="left">Documentacion</legend>
		<p>Obra: {{ $obra->d_obra }}</p>
		<div>
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>url</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($doctos as $doc)
					<tr>
						<td>{{ $doc->d_nombredoc }}</td>
						<td>
							<a target="blank" href="{{ URL::to($doc->d_urldoc) }}">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
