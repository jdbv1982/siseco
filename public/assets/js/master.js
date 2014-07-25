$(document).ready(function() {
	var rutas = [ "../distritos/", "../municipios/", "../localidades/" ,"../nuevoDistrito/", "../nuevoMunicipio/", "../nuevaLocalidad/", "../nuevoDistrito" , "../nuevoMunicipio", "../nuevaLocalidad","../subprogramas/","../tipoprogramas/","../subfuentes/","../origenes/","../suborigenes/","../clasificacion/","../financiero/","../meta/" ];
	var rutas1 = [ "../../distritos/", "../../municipios/", "../../localidades/" ,"../nuevoDistrito/", "../nuevoMunicipio/", "../nuevaLocalidad/", "../nuevoDistrito" , "../nuevoMunicipio", "../nuevaLocalidad","../../subprogramas/","../../tipoprogramas/","../../subfuentes/","../../origenes/","../../suborigenes/","../../clasificacion/","../../financiero/","../../meta/"];


	if($('#_nivel').val() == 0){misRutas = rutas;}else{misRutas = rutas1;}


	$(document).on('click', '.test', function(){
		$(this).removeClass( "test" );
		$(this).addClass( "vertest" );
	});

	$(document).on('click', '.vertest', function(){
		$(this).removeClass( "vertest" );
		$(this).addClass( "test" );
	});

	//aqui mostramos los datos traidos por ajax para rellenar los combos
	$(document).on('change','#idregion',function(){
		if($('#_nivel').val() == 0){misRutas = rutas;}else{misRutas = rutas1;}
		rellenaSelect($('#iddistrito'),misRutas[0],$(this).val());
	});

	$(document).on('change','#iddistrito',function(){
		if($('#_nivel').val() == 0){misRutas = rutas;}else{misRutas = rutas1;}
		rellenaSelect($('#idmunicipio'),misRutas[1],$(this).val());
	});

	$(document).on('change','#idmunicipio',function(){
		if($('#_nivel').val() == 0){misRutas = rutas;}else{misRutas = rutas1;}
		rellenaSelect($('#idlocalidad'),misRutas[2],$(this).val());
	});

	$('#idprograma').on('change',function(){
		rellenaSelect($('#idsubprograma'),misRutas[9],$(this).val());
	});

	$('#idsubprograma').on('change',function(){
		rellenaSelect($('#idtipo'),misRutas[10],$(this).val());
	});

	//rellenamos los select de identificacion para el area de planeacion
	$('#idfuente').on('change',function(){
		rellenaSelect($('#idsubfuente'),misRutas[11],$(this).val());
	});

	$('#idsubfuente').on('change',function(){
		rellenaSelect($('#idorigen'),misRutas[12],$(this).val());
	});

	$('#idorigen').on('change',function(){
		rellenaSelect($('#idsuborigen'),misRutas[13],$(this).val());
	});

	$('#idsuborigen').on('change',function(){
		rellenaSelect($('#idclassuborigen'),misRutas[14],$(this).val());
	});

	$('#idclassuborigen').on('change',function(){
		rellenaSelect($('#idcvefin'),misRutas[15],$(this).val());
	});

	$('#idunidadmedida').on('change',function(){
		rellenaSelect($('#idmeta'),misRutas[16],$(this).val());
	});

	//fin del relleno

	$(document).on('click','#unconcepto', function(e){
		e.preventDefault();
		agregarEstructura($('#fila'), $('#estructurabody'));

	});


	$('#otrocalendario').on('click', function(e){
		e.preventDefault();
		agregarEstructura($('#filacal'), $('#bodycal'));
	});

	if($('#indtotal').val() > 0){
		$('#indeje').removeClass('oculto');
	}

	$( "body" ).on( "click", "#btnautorizar", function(e) {
		e.preventDefault();
	  	varificarAccesso($('#usuario').val(),$('#pass').val());
	});

	$( "body" ).on( "click", "#btnmodal", function(e) {
		e.preventDefault();
	  	guardaOficio($('#idobra').val());
	});

	$(document).on('click','#versumas',function(e){
		e.preventDefault();
		sumar($('#estructura'),1,2);
	});

	$(document).on('click','#versumascal',function(e){
		e.preventDefault();
		sumar($('#tblcal'),2,3);
	});

	$(document).on('click','#sumarcale',function(e){
		e.preventDefault();
		sumardiv($('.mes'),$('#sumacalen'));
	});



	$('#ppi').on('focusout', function(){
		getDescripcion($(this).val(), $('#nombreppi'));
	});


	$('#unconceptoedit').on('click', function(e){
		e.preventDefault();
		agregarEstructura($('#filaedit'), $('#estructurabodyedit'));
	});

	$( document ).on('click','#efin',function() {
		$( "#estfin" ).slideToggle( "slow" );
	});

	$(document).on('click','#otrocalendarioedit', function(e){
		e.preventDefault();
		agregarEstructura($('#filacaledit'), $('#bodycaledit'));
	});

	$( document ).on('click','#vernotifi',function() {
		$( "#contnotif" ).slideToggle( "slow" );
	});




	$( "body" ).on( "click", "#addfianza", function(e) {
		e.preventDefault();
	  	guardaFianza($('#idobra').val());
	});

	$( "body" ).on( "click", "#addconvenio", function(e) {
		e.preventDefault();
	  	guardaConvenio($('#idobra').val());
	});

	$( "body" ).on( "click", "#adddiferimiento", function(e) {
		e.preventDefault();
	  	guardaDiferimiento($('#idobra').val());
	});

	$( "body" ).on( "click", "#addadendo", function(e) {
		e.preventDefault();
	  	guardaAdendo($('#idobra').val());
	});


	$( "body" ).on( "click", "#setcontratista", function(e) {
		e.preventDefault();
	  	guardaContratista();
	});

	//funciones para el area de obras


	$( "body" ).on( "click", "#addestimacion", function(e) {
		e.preventDefault();
	  	guardaEstimacion($('#idobra').val());
	});

	$( "body" ).on( "click", "#saveevento", function(e) {
		e.preventDefault();
	  	guardaEvento();
	});

	$( "body" ).on( "click", "#saveseguimiento", function(e) {
		e.preventDefault();
	  	guardaSeguimiento();
	});

	$( "body" ).on( "click", "#saveresidencia", function(e) {
		e.preventDefault();
	  	guardaResidencia();
	});





	    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"
            });
        }
    });

//funciones para la parte de administracion

$(document).on('click', '.selfactura', function(){
	$('#facturas').modal('hide');
	$('#numfactura').val($(this).closest('tr').find('td:eq(0)').text());
});


$(document).on('click', '#detalleclc', function(){
	$('#myModal').modal({
		backdrop:'static',
  		keyboard: false
	});

	var progreso = 0;
	var item = 1;

	$(".progress-bar").html("0%");
	$(".progress-bar").css("width", "0%");
	var inputFileImage = document.getElementById("archivo_clc");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('myfile',file);
	var url = "../detalleclc";

	$.ajax({
	                type: "POST",
	                url: url,
	                data: data,
	                async: false,
	                cache: false,
	                contentType: false,
	                processData: false,
	                dataType: "json",
	                success: function(data){
	                	var total = data.length;
	                    	$.each( data, function(key) {
	                    		$.post( "../insertaregistro",{registro:data[key]}).done(function( data ) {
					progreso = Math.round((item) * 100 / total);
			            		$(".progress-bar").html(progreso+"%");
			            		$(".progress-bar").css("width", progreso+"%");
			            		item = item + 1;
				  });;
			});
	                }
	});
});




//tablero de mando
$( "body" ).on( "click", "#linkautorizadas", function(e) {
	e.preventDefault();
	$.get( "../descripcion/"+2, function( data ) {
		$.each( data, function( key, value ) {
				sel.val(value);
			});
	});
});

$("body").on('focusin',".nombrecal",function(){
	$( this ).parent().css( "width", "20%" );
});
$("body").on('focusout',".nombrecal",function(){
	$( this ).parent().removeAttr("style");
});

$("body").on('focusin',".montocal",function(){
	$( this ).parent().css( "width", "10%" );
	$(this).priceFormat({
	    prefix: '$ ',
	    centsSeparator: '.',
	    thousandsSeparator: ',',
	    allowNegative: true,
	    centsLimit: 2

	});
});
$("body").on('focusout',".montocal",function(){
	$( this ).parent().removeAttr("style");
	$(this).priceFormat({
	    prefix: '',
	    allowNegative: true,
	    thousandsSeparator: ''
	});
});


 $("body").on('keyup', '.vervalor',function () {
      var value = $(this).val();
      $("#valor").text(value);
    });


$("body").on('focusin',".vervalor",function(){
	var value = $(this).val();
      $("#valor").text(value);
});


});




//+++++++++++++++++++OBRAS*************************

function guardaEstimacion(id){
	var data = $('#idestimacion').serialize();

	$.ajax({
	url:"../../agregaestimaciones/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#estimacion').modal('hide');
			rellenaEstimaciones('../../estimaciones/',id,$('#tbodyest').html(""));
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;

}


function rellenaEstimaciones(url, id, sel){
	$.post(url+id,function(data){
			sel.html('');
			$.each( data, function(key) {
					if(data[key].fecha1 == null){data[key].fecha1 = '';}
					if(data[key].fecha2 == null){data[key].fecha2 = '';}
					if(data[key].fecha3 == null){data[key].fecha3 = '';}
					if(data[key].fecha4 == null){data[key].fecha4 = '';}
					if(data[key].fecha5 == null){data[key].fecha5 = '';}
					if(data[key].fecha6 == null){data[key].fecha6 = '';}

            	sel.append('<tr><td>'+data[key].nombre+'</td> '+
            		'<td class="text-center">'+data[key].clave+'</td> '+
            		'<td class="text-right">'+ data[key].importe +'</td> '+
            		'<td>'+ data[key].fecha1 +'</td> '+
            		'<td>'+ data[key].fecha2 +'</td> '+
            		'<td>'+ data[key].fecha3 +'</td> '+
            		'<td>'+ data[key].fecha4 +'</td> '+
            		'<td>'+ data[key].fecha5 +'</td> '+
            		'<td>'+ data[key].fecha6 +'</td> '+
            		'</tr>');
			});
	});

}


//********************funciones Licitaciones*************************//

function guardaAdendo(id){
	var nombreadendo	= $('#nombreadendo').val();
	var descadendo		= $('#descadendo').val();
	var obsadendo		= $('#obsadendo').val();
	var data = $('#idadendo').serialize();

	$.ajax({
	url:"../../agregaadendo/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#tbadendos').append('<tr><td>'+ nombreadendo +'</td> <td>'+ descadendo +'</td> <td>'+ obsadendo +'</td> </tr>');
			$('#adendo').modal('hide');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;

}

function guardaConvenio(id){
	var numconvenio 	= $('#numconvenio').val();
	var fechaconvenio	= $('#fechaconvenio').val();
	var tipoconvenio	= $('#tipoconvenio option:selected').html();
	var cantconvenio	= $('#cantconvenio').val();
	var data = $('#idconvenio').serialize();

	$.ajax({
	url:"../../agregaconvenio/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#tbconvenios').append('<tr><td>'+ numconvenio +'</td> <td>'+ fechaconvenio +'</td> <td>'+ tipoconvenio +'</td> <td>'+ cantconvenio +'</td> </tr>');
			$('#convenio').modal('hide');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;

}


function guardaFianza(id){
	var numfianza = $('#numfianza').val();
	var montofianza = $('#montofianza').val();
	var fechafianza = $('#fechafianza').val();
	var tipofianza = $('#tipofianza option:selected').html()
	var numfactura = $('#numfactura').val();
	var montofactura = $('#montofactura').val();
	var data = $('#idfianza').serialize();

	$.ajax({
	url:"../../agregafianza/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#tbfianzas').append('<tr><td>'+ numfianza +'</td> <td>'+ montofianza +'</td> <td>'+ fechafianza +'</td> <td>'+ tipofianza +'</td> <td>'+ numfactura +'</td> <td>'+ montofactura +'</td> </tr>');
			$('#fianza').modal('hide');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}



function varificarAccesso(usuario, pass){
	var data = $('#verautorizacion').serialize();

	$.ajax({
	url:"../../autorizar"
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			$('#autorizar').modal('hide');
			$('#myModal').modal('show');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;


}

function guardaDiferimiento(id){
	var numdiferimiento 	= $('#numdiferimiento').val();
	var fechadiferimiento	= $('#fechadiferimiento').val();
	var cantdiferimiento	= $('#cantidad').val();
	var data = $('#iddiferimiento').serialize();

	$.ajax({
	url:"../../agregadiferimiento/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#tbdiferimiento').append('<tr><td>'+ numdiferimiento +'</td> <td>'+ fechadiferimiento +'</td> <td>'+ cantdiferimiento +'</td> </tr>');
			$('#diferimientos').modal('hide');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;

}


//funcion para guardar un oficio
function guardaOficio(id){
	var nombreoficio = $('#nombreoficio').val();
	var numerooficio = $('#numerooficio').val();
	var fechaofico = $('#fechaoficio').val();
	var fecharec = $('#fecharecibido').val();
	var data = $('#idoficio').serialize();

//return true;
$.ajax({
	url:"../../agregaoficio/"+id
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			limpiarCampos();
			$('#tboficios').append('<tr><td>'+ nombreoficio +'</td> <td>'+ numerooficio +'</td> <td>'+ fechaofico +'</td> <td>'+ fecharec +'</td> </tr>');
			$('#myModal').modal('hide');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}

//funcion para rellenar combos-selects
function rellenaSelect(sel,url,id){
	$.post(url+id,function(data){
			sel.html('');
			sel.append('<option value="'+0+'">'+'SELECCIONE...'+'</option>');
			$.each( data, function( key, value ) {
            	sel.append('<option value="'+value+'">'+key+'</option>');
			});
			sel.focus();
	});
}

function agregaDato(id_,url_,titulo_,urlp_,sel_,urls_){
	id = id_;
		$.get(url_+id, function(data){
			$('#dialog').html(data);
			$('#dialog').dialog({
					autoOpen: true,
                	modal: true,
                	title:titulo_,
                    position:'center',
                    height: 300,
                    width: 300,
                    buttons: {
                "Aceptar": function() {
                    var checking = $('#formAdd').serialize();
                    $.ajax({
                           url:urlp_
                           ,type : "POST"
                           ,async: true
                           ,data : checking
                           ,success: function(msg){
                           		if(msg == 'true'){
                                	$('#dialog').dialog('close');
                                	rellenaSelect(sel_,urls_,id);
                           		}else{
                           			$('.alerta').css({ display: "block" });
                           			$.each( msg, function( key, value ) {
                           				$('.alerta').html('');
                           				$('.alerta').append('<h6> El campo '+key+' es Obligatorio</h6>');
									});
                           		}
                           }
                    });
                },
                "Cancelar": function(){
                    $('#dialog').dialog('close');
                }
            }
			});
		});
}


function getDescripcion(id, sel){
	sel.val('');
	$.get( "../descripcion/"+id, function( data ) {
		$.each( data, function( key, value ) {
				sel.val(value);
			});
	});

}


function limpiarCampos(){
	$("input[type=text]").val("");
    $("textarea").val("");
}

function agregarEstructura(idest, idtable){
	estructura = idest.html();
	idtable.append('<tr>'+estructura+'</tr>');
}


function sumar(miTabla, numero, jcolumna) {
  filas = miTabla.find("tbody tr")
  for (var i = 1; i <= filas.length; i++) {
  var suma = 0.00;
  		celdas = miTabla.find('tr').eq(i).find('td');
  		for (var j = jcolumna; j < celdas.length; j++) {
  			var valor = parseFloat(miTabla.find('tr').eq(i).find('td  > input').eq(j).val()).toFixed(2);
  			//var valor = parseFloat($('#estructura tr').eq(i).find('td  > input').eq(j).val());
  			suma = roundToTwo(suma) + roundToTwo(valor);
  		};
  			suma = parseFloat(suma).toFixed(2);
  			miTabla.find('tr').eq(i).find('td  > input').eq(numero).val(suma);
    }

} // end function


function roundToTwo(num) {
    return +(Math.round(num + "e+2")  + "e-2");
}


function guardaContratista(){
	var data = $('#addcontratista').serialize();

	$.ajax({
	url:"../../agregacontratista"
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			$('#contratista').modal('hide');
			rellenaUnSelect($('#l_idempresa'),'../../contratistas');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}

function guardaEvento(){
	var data = $('#postvento').serialize();

	$.ajax({
	url:"../../agregaevento"
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			$('#formevento').modal('hide');
			rellenaUnSelect($('#idevento'),'../../eventos');
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}


function rellenaUnSelect(sel,url){
	$.post(url,function(data){
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
  			//var valor = parseFloat($('#estructura tr').eq(i).find('td  > input').eq(j).val());
  			suma = roundToTwo(suma) + roundToTwo(valor);
	});

	miTotal.val(suma);


} // end function

function guardaSeguimiento(){
	var data = $('#postseguimiento').serialize();

	var comentarios = $('#comentarios').val();
	var concejecutar = $('#concejecutar').val();
	var observaciones = $('#observaciones').val();
	var observacionesseg = $('#observacionesseg').val();
	var codigoaccion = $('#codigoaccion').val();
	var ninforme = $('#ninforme').val();

	$.ajax({
	url:"../../agregaseguimiento"
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			$('#seguimiento').modal('hide');
			$('.alerta').toggle(500, function() {
		                  setTimeout("$('.alerta').fadeOut('slow');", 500);
		             });
	 		$('#comentariosok').html(comentarios);
	 		$('#concejecutarok').html(concejecutar);
	 		$('#observacionesok').html(observaciones);
	 		$('#observacionessegok').html(observacionesseg);
	 		$('#codigoaccionok').html(codigoaccion);
	 		$('#ninformeok').html(ninforme);
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}

function guardaResidencia(){
	var data = $('#postseguimiento').serialize();

	var idresidencia = $('#idresidencia').val();
	$.ajax({
	url:"../../agregaresidencia"
	,type : "POST"
	,async: true
	,data : data
	,success: function(msg){
		if(msg == 'true'){
			$('#residencia').modal('hide');
			$('.alerta').toggle(500, function() {
		                  setTimeout("$('.alerta').fadeOut('slow');", 500);
		             });
			setNombreResidencia($('#residenciaok'),idresidencia);
		}else{
			$('.alerta').css({ display: "block" });
			$('.mensage').html('');
				$.each( msg, function( key, value ) {
					$('.mensage').append('<h6>'+value+'</h6>');
				});
			}
		}
	});
	return true;
}

function setNombreResidencia(elemento,idresidencia){
	$.post( "../../getNombreResidencia/"+idresidencia, function( data ) {
  		elemento.html( data );
	});
}
