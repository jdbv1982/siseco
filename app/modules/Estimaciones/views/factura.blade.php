<div class="col-xs-10 col-xs-offset-1">
<h2>Listado de Estimaciones y facturas</h2>

<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
	<thead>
		<tr>
			<th># Estimacion</th>
			<th>Nombre</th>
			<th>Folio</th>
			<th>Fecha</th>
			<th>Subtotal</th>
			<th>Amortizacion x Anticipo</th>
			<th>Liquido</th>
			<th>Periodo de ejecucion</th>
			<th>Observaciones</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

		@foreach ($datos as $dato)
		<tr>
			<td>{{ $dato->id }}</td>
			<td>{{ $dato->nombre }}</td>
			<td>{{ $dato->folio }}</td>
			<td>{{ $dato->fechaexp }}</td>
			<td>{{ $dato->subtotal }}</td>
			<td>{{ $dato->amtzxant }}</td>
			<td>{{ $dato->liquido }}</td>
			<td>Del {{ $dato->finieje }} al {{ $dato->ffineje }}</td>
			<td>{{ $dato->observaciones }}</td>
			<td class="text-center">
				<a href="{{ URL::to('facturas/nuevo/'.$dato->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Agregar una Factura"><img src="../../../public/assets/images/app/addfactura.png" alt=""></a>
			</td>

		</tr>
		@endforeach
	</tbody>
</table>
</div>
