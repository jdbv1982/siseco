<h2>Reporte de Obras Autorizadas</h2>


 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
    <thead>
        <tr>
        	<th>id</th>
            <th>Nombre Obra</th>
            <th>Monto</th>
            <th>No. Oficio</th>
            <th>Fecha</th>
            <th>Fuente Ftto</th>
        </tr>
    </thead>
    <tbody>
        
    @if( count($obras) > 0)
	    @foreach ($obras as $obra)
	    <tr>
	    	<td>{{ $obra->id }}</td>
	        <td>{{ $obra->nombreobra }}</td>
	        <td>{{ $obra->monto }}</td>
	        <td class="upper">{{ $obra->numerooficio }}</td>
	        <td>{{ $obra->fechaoficio }}</td>
			<td>{{ $obra->nombrefinanciamiento }}</td>
	    </tr>
	    @endforeach
	@endif    
    </tbody>
  </table>
