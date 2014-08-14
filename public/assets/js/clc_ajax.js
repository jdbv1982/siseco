jQuery(document).ready(function($) {
	$(document).on('change', '#ejercicio_id', function(){
		rellena_select();
	});

	$(document).on('change', '#banco_id', function(){
		rellena_select();
	});

	$(document).on('focusin','#total_clc',function(e){
		e.preventDefault();
		sumardiv($('.suma-clc'),$('#total_clc'));
	});

	$(document).on('focusout','#total_clc',function(e){
		e.preventDefault();
		verificaMontos($("#monto_a_pagar"), $("#total_clc"));
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

function sumardiv(miClase, miTotal ) {
	var suma = 0;
	miClase.each(function(key, element){
		var valor = parseFloat($(element).val());
			suma = roundToTwo(suma) + roundToTwo(valor);
	});

	miTotal.val(suma);
} // end function

function verificaMontos(montoClc, montoOrden){
	var montoClc = parseFloat(montoClc.val());
	var montoOrden = parseFloat(montoOrden.val());

	if (montoOrden > montoClc){
		alert('No puedes exceder el monto de la clc');
		$('#btn_pago').addClass('disabled');
	}else{
		$('#btn_pago').removeClass('disabled');
	}
}
