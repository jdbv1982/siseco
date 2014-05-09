<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') .:: SISECO ::.</title>
    @include('layouts.css')
</head>
<body>
	@include('layouts.menu')
	<div class="contenido">
    	@if(isset($contenido))
		{{ $contenido }}
		@endif						
	</div>


    @include('layouts.js')
</body>
</html>
