<div class="col-lg-6">
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkdistrito',1)}}
		</span>
		{{ Form::select('iddistrito', $distritos,null, array('class' => 'form-control upper','id'=>'iddistrito')) }}
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
