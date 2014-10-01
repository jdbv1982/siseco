jQuery(document).ready(function($) {
	var contador = 1;

	$(document).on('change', '#ejercicio_id', function(){
		rellena_select();
	});

	$(document).on('change', '#banco_id', function(){
		rellena_select();
	});

	$(document).on('click','#validar-orden', function(e){
		e.preventDefault();
		revisarSuma($('.sumamonto'),$('#importe'));
		validarOrden();
	});

	$(document).on('click', '#addfactura', function(){
		$("#list-facturas").modal();
	});

	$(document).on('click', '.sel-factura', function(){
   		agregaFactura($("#facturas-list"), contador, $(this).closest('tr').find('td:eq(0)').text(), $(this).closest('tr').find('td:eq(2)').text());
		contador++;
	});
});

function validarOrden(){


	verificaMontos($("#monto_a_pagar"), $("#total_clc"));

	if ($('#importe').val() > 0){
		$('#total_clc').val($('#importe').val())
	}else{
		alert("El importe de la orden no puede ser 0");
	}

	if($("#facturas-list tbody").find("tr").length==0){
		alert("La orden debe de contener minimo una factura");
	}

	sumardiv($('.suma-clc'),$('#total_clc'));
}

function revisarSuma(miClase, miTotal){
	var suma = 0;
	miClase.each(function(key, element){
		var valor = parseFloat($(element).val());
  		suma = roundToTwo(suma) + roundToTwo(valor);
	});

	miTotal.val(suma);
}

function agregaFactura(list, contador, factura, valor){
	list.append('<tr id="'+contador+'" > '+
			'<td> '+
				'<div class="form-group col-xs-12 col-sm-6"> '+
					'<input class="form-control" name="factura[]" type="text" value="'+factura+'"></div> '+
				'<div class="form-group col-xs-12 col-sm-5"> '+
					'<input class="form-control sumamonto text-right" name="monto[]" value="'+valor+'" type="text"></div> '+
				'<div class="form-group col-xs-12 col-sm-1"> '+
					'<input type="button" class="btn btn-default" onclick="elimina_me('+contador+')" value="X">'+
				'</div>'+
			'</td> '+
		'</tr>'	);
}



function elimina_me(elemento){
 	$("#"+elemento).remove();
}

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
