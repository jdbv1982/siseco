{{-- Form::open(array('url'=> array('agregafianza', $id),'method'=>'POST','id'=>'idfianza')) --}}
<input type="hidden" id="idobra" name="idobra" value="{{-- $id--}}">
<div class="modal fade" id="facturas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Fianza</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<table cellpadding="0" cellspacing="0" border="0" id="tbdiferimientos" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Subtotal</th>
                        <th>Liquido</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td id="selid">{{ $factura->folio}}</td>
                        <td>{{ $factura->fechaexp}}</td>
                        <td>{{ $factura->subtotal}}</td>
                        <td>{{ $factura->liquido}}</td>
                        <td>{{ $factura->observaciones}}</td>
                        <td>
                            <button class="btn btn-default selfactura" type="button">
                                <span class="glyphicon glyphicon-hand-up"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            	</div>
            </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="addfianza" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{-- Form::close() --}}
