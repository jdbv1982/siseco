<div class="col-xs-10 col-xs-offset-1">
<h3>Avance Fisico y Financiero</h3>

<p><strong>Numero: </strong>{{ $obra->numeroobra }}</p>
<p><strong>Nombre: </strong>{{ $obra->nombreobra }}</p>
<br>

{{ Form::open(array('url'=> array('avance/nuevo',$obra->id),'files' =>true,'method'=>'POST','class'=>'form-horizontal')) }}
	<input type="hidden" name="idobra" value="{{ $obra->id }}" >
	<input type="hidden" name="idfgeneral" value="{{ $obra->idfgeneral }}" >

	<div class="form-group">
		{{ Form::label('afisico', 'Avance Fisico', array('class'=>'col-lg-2')) }}
		<div class="col-lg-2">
			{{ Form::text('afisico', null, array('class'=>'form-control', 'required')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('afinanciero', 'Avance Financiero', array('class'=>'col-lg-2')) }}
		<div class="col-lg-2">
			{{ Form::text('afinanciero', null, array('class'=>'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('observaciones', 'Observaciones', array('class'=>'col-lg-2')) }}
		<div class="col-lg-10">
			{{ Form::textarea('observaciones',null,array('class'=>'form-control','rows'=>'2')) }}
		</div>
	</div>

	<div class="row col-lg-12">
		<br>
		<div class="col-lg-4">
			<div class="form-group">
				<div class="col-lg-10">
					<input name="foto1" class="form-control file" id="file1" type='file' required="required"/>
				</div>
    				<div id="prev_file1"></div>				
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div class="col-lg-10">
					<input name="foto2" class="form-control file" id="file2" type='file' required="required" />
				</div>
    				<div id="prev_file2"></div>				
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div class="col-lg-10">
					<input name="foto3" class="form-control file" id="file3" type='file' required="required" />
				</div>
    				<div id="prev_file3"></div>				
			</div>
		</div>

	</div>

	<br>
	<div class="form-group">
		{{ Form::submit('Guardar',array('class'=>'btn btn-primary')) }}
		<a href="{{ URL::to('obras/listado/'.$obra->idfgeneral) }}" class="btn btn-primary">Cancelar</a>
	</div>


{{ Form::close() }}
</div>
