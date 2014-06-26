jQuery(document).ready(function($) {
	$(document).on('click','.reporte', function(event) {
		event.preventDefault();
		getVista($(this).attr('href'));
	});

});

function getVista(url){
	$.get( url, function( data ) {
		$( "#filtros" ).html( data );
	});
}
