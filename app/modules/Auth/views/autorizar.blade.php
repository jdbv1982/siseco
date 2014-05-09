
	<!-- Revisemos si tenemos errores de login -->
	@if (Session::has('error_login'))
		<p class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <strong>Error!</strong> Usuario o contraseña incorrectos.
		 </p>
	@endif
	<div class="col-md-6 col-md-offset-3">
		{{ Form::open(array('route' => 'login.post')) }}
		<h2>Iniciar Sesion</h2>
		<hr>

		<div class="form-group">
			<label for="correo">Correo</label>
			<input type="text" id="correo" name="correo" class="form-control">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Entrar</button>

		{{ Form::close() }}
	</div>
