<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<legend align="left">Planeacion</legend>
		<div>
		<table class="table table-bordered table-condensed">
        <thead>
          <tr>            
            <th>Fuente</th>
            <th>No. Obras</th>
            <th>Monto ( $ )</th>
          </tr>
        </thead>
        <tbody>
		@foreach($planeacion as $item)
          <tr>
            <td>{{ $item->nombre_fuente }}</td>
            <td>{{ $item->numobras }}</td>
            <td class="text-right moneda">{{ $item->monto }}</td>
          </tr>
		@endforeach
        </tbody>
        <tfoot>
        	@foreach($totplan as $tot)
        	<tr class="success">
        	<th>Totales:</th>
            <th>{{ $tot->plantotobras }}</th>
            <th class="text-right moneda">{{ $tot->plantotmonto }}</th>
        </tr>
            @endforeach
        </tfoot>
      </table>
  		</div>
	</div>

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<legend align="left">Licitaciones</legend>
		<table class="table table-bordered table-condensed">
        <thead>
          <tr>            
            <th>Fuente</th>
            <th>No. Obras</th>
            <th>Contratado ( $ )</th>
          </tr>
        </thead>
        <tbody>
		@foreach($licitaciones as $licitem)
          <tr>
            <td>{{ $licitem->nombre_fuente }}</td>
            <td>{{ $licitem->licnumobras }}</td>
            <td class="text-right moneda">{{ $licitem->licmonto }}</td>
          </tr>
		@endforeach
        </tbody>
        <tfoot>
        	@foreach($totlic as $totlic)
        	<tr class="success">
	        	<th>Totales:</th>
	            <th>{{ $totlic->lictotobras }}</th>
	            <th class="text-right moneda">{{ $totlic->lictotmonto }}</th>
	        </tr>
            @endforeach
        </tfoot>
      </table>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<legend align="left">Obras</legend>
		<table class="table table-bordered table-condensed">
        <thead>
          <tr>            
            <th>Fuente</th>
            <th>No. Obras</th>
            <th>Monto ( $ )</th>
          </tr>
        </thead>
        <tbody>
		@foreach($administracion as $admitem)
          <tr>
            <td>{{ $admitem->nombre_fuente }}</td>
            <td>{{ $admitem->admnumobras }}</td>
            <td class="text-right moneda">{{ $admitem->admmonto }}</td>
          </tr>
		@endforeach
        </tbody>
		<tfoot>
        	@foreach($totadm as $admtot)
        	<tr class="success">
	        	<th>Totales:</th>
	            <th>{{ $admtot->admtotobras }}</th>
	            <th class="text-right moneda">{{ $admtot->admtotmonto }}</th>
	        </tr>
            @endforeach
        </tfoot>
      </table>
	</div>

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<legend align="left">Administracion</legend>
		<table class="table table-bordered table-condensed">
        <thead>
          <tr>            
            <th>Fuente</th>
            <th>No. Obras</th>
            <th>Monto ( $ )</th>
          </tr>
        </thead>
        <tbody>
    @foreach($administracion as $admitem)
          <tr>
            <td>{{ $admitem->nombre_fuente }}</td>
            <td>{{ $admitem->admnumobras }}</td>
            <td class="text-right moneda">{{ $admitem->admmonto }}</td>
          </tr>
    @endforeach
        </tbody>
    <tfoot>
          @foreach($totadm as $admtot)
          <tr class="success">
            <th>Totales:</th>
              <th>{{ $admtot->admtotobras }}</th>
              <th class="text-right moneda">{{ $admtot->admtotmonto }}</th>
          </tr>
            @endforeach
        </tfoot>
      </table>
	</div>
</div>
