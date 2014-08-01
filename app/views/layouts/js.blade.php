{{ HTML::script('assets/js/jquery.js') }}
{{ HTML::script('assets/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/js/datatables.js') }}
{{ HTML::script('assets/js/master.js') }}
{{ HTML::script('assets/js/componentes.js') }}
{{ HTML::script('assets/js/reportes_ajax.js') }}
{{ HTML::script('assets/js/jquery-ui.js') }}
{{ HTML::script('assets/js/tablas.js') }}
{{ HTML::script('assets/js/preimage.js') }}
{{ HTML::script('assets/js/timeliner.min.js') }}
{{ HTML::script('assets/js/jquery.prettyPhoto.js') }}
{{ HTML::script('assets/js/priceformat.js') }}

@if(isset($js))
	{{ HTML::script($js) }}
@endif
