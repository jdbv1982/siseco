<div class="col-lg-6">
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chklocalidad',1)}}
		</span>
		{{ Form::select('idlocalidad', $localidades,null, array('class' => 'form-control upper','id'=>'idlocalidad')) }}
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
