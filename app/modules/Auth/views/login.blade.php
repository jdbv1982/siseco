
	<!-- Revisemos si tenemos errores de login -->
	@if (Session::has('error_login'))
		<p class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <strong>Error!</strong> Usuario o contraseña incorrectos.
		 </p>
	@endif
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-6 col-lg-offset-3">
		{{ Form::open(array('route' => 'login.post')) }}
		<div class="well well-lg">
			<h3 class="text-center">Iniciar Sesion</h3>
			<div class="alert alert-warning text-center">
						Inserte su Correo y Contraseña.
			</div>

			<div class="input-group col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" id="correo" name="correo" class="form-control" autofocus="autofocus" placeholder="Correo Electronico">
			</div>
			<br>
			<div class="input-group col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<span class="input-group-addon glyphicon glyphicon-lock"></span>
				<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
			</div>
			<br>

			<div class="row col-lg-12">
				<button type="submit" class="btn btn-default col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2">Entrar</button>				
			</div>	
			<br>
		</div>
		

		

		


		{{ Form::close() }}
	</div>
