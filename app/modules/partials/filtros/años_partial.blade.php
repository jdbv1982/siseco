<div class="col-lg-3">
	<div class="form-group">
		{{ Form::select('regla', ['='=>'IGUAL', '<'=>'MENOR','<='=>'MENOR IGUAL', ],null, array('class' => 'form-control')) }}
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->

<div class="col-lg-4">
	<div class="form-group">
		{{ Form::select('year', $años,null, array('class' => 'form-control')) }}
	</div><!-- /input-group -->
</div><!-- /.col-lg-6 -->
