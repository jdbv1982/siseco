<div class="col-lg-6">
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkfgeneral',1)}}
		</span>
		{{ Form::select('chkfgeneral', $fuentes,null, array('class' => 'form-control upper')) }}
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
