@extends('templates.esqueleto')

@section('content')

<div class="container" id="main_container">

	<h1 id="titulo">Vendedores</h1>

	<table id="tbl_vendedores" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Fecha Registro</th>
                <th>Fecha Modificación</th>
                <th>Acción</th>
            </tr>
    	</thead>
    </table>

</div>

@endsection
