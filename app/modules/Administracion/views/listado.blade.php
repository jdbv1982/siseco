<div class="col-xs-10 col-xs-offset-1">
<h2>Administracion</h2>
<p><strong>Numero: </strong> {{$planeacion->numeroobra}}</p>
<p><strong>Nombre: </strong> {{$planeacion->nombreobra}}</p>
<p>
    <a href="{{ URL::to('administracion/nuevo/'.$planeacion->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></a>
</p>
<div class="table-responsive">
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	<th>#</th>
            <th>Clc</th>
            <th>Elab</th>
            <th>Recepcion</th>
            <th>Fact</th>
            <th>Concepto</th>
            <th>Fianza</th>
            <th>Ministrado</th>
            <th>5 %</th>
            <th>2 %</th>
            <th>Radicado</th>
            <th>Orden</th>
            <th>Amort. Cred. Pte</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($adms as $adm)
    <tr>
    	<td>{{ $adm->id }}</td>
        <td>{{ $adm->clc }}</td>
        <td>{{ $adm->felab }}</td>
        <td>{{ $adm->frecp }}</td>
        <td>{{ $adm->numfactura }}</td>
        <td>{{ $adm->concepto }}</td>
        <td>{{ $adm->fianza }}</td>
        <td>{{ $adm->ministrado }}</td>
        <td>{{ $adm->porc5 }}</td>
        <td>{{ $adm->porc2 }}</td>
        <td>{{ $adm->radicado }}</td>
        <td>{{ $adm->orden }}</td>
        <td>{{ $adm->amort_cred_pte }}</td>
        <td class="text-center">
            <a class="btn btn-default" href="{{ URL::to('administracion/editar/'.$adm->id) }}">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
        </td>

    </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>
