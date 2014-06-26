$(document).ready(function() {
	$('.fecha').datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });

	$(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false, social_tools:''});
	$('.file').preimage();//muestra las imagens en minuatura antes de subirlas al servidor
	$.timeliner({fontOpen: '1.2em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is opened
			fontClosed: '1em', // value: any valid CSS font-size value, defaults to 1em; sets the font size of an event after it is closed
			expandAllText: '+ expandir todo', // value: string; defaults to '+ expand all'
			collapseAllText: '- colapsar todo'
	});
});
