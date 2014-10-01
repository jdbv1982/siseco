<div class="modal fade" id="list-facturas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <div class="alert alert-danger alert-dismissable alerta oculto">
                  <strong>Error!</strong> Corregir los siguientes Errores:.
                  <p class="mensage"></p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Addendum</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th width="20%">Id</th>
					<th>Factura</th>
					<th>Monto</th>
					<th class="text-center"><span class="glyphicon glyphicon-thumbs-up"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($facturas as $factura)
				<tr>
					<td>{{ $factura->referencia }}</td>
					<td>{{ $factura->proveedor }}</td>
					<td class="text-right">{{ $factura->total }}</td>
					<td width="5%" class="text-center"><a href="#" class="sel-factura"><span class="glyphicon glyphicon-thumbs-up"></span></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
