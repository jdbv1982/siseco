<h3>Importar Clc's</h3>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('archivo_clc','Seleccione Archivo') }}
			<div class="controls">
				{{ Form::file('archivo_clc', array('class'=>'form-control','id'=>'archivo_clc')) }}

			</div>
		</div>
		<div class="form-group">
			<a href="#" class="btn btn-primary" id="detalleclc">Aceptar</a>
			<a href="{{ URL::to('clc/guardar') }}" class="btn btn-primary">Cancelar</a>
		</div>
		<br>
	</div>

	<div id="no-encontradas" class="hidden">
		<legend>Obras no encontradas: </legend>
	</div>



</div>

 <!-- Small modal -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div>
                  <img src="../../public/assets/images/loader.gif" alt=""/>
                  Procesando Informacion....
              </div>
            </div>
          </div>
        </div>
