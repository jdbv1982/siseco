jQuery(document).ready(function($) {
	$(document).on('change', '#ejercicio_id', function(){
		rellena_select();
	});

	$(document).on('change', '#banco_id', function(){
		rellena_select();
	});
});

function rellena_select(){
	var ejercicio = $('#ejercicio_id').val();
	var banco = $('#banco_id').val();
	var sel = $('#id_cuenta');

	$.post("../../cuentas",{ejercicio:ejercicio, banco:banco}, function(data){
		sel.html('');
		sel.append('<option value="'+0+'">'+'SELECCIONE...'+'</option>');
		$.each( data, function( key, value ) {
            			sel.append('<option value="'+value+'">'+key+'</option>');
		});
		sel.focus();
	});

}
