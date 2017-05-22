@extends('templates.esqueleto')

@section('content')

<div class="container" id="main_container">

	<h1 id="titulo">Accesorios</h1>

	<table id="tbl_accesorios" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Alta-Modificación</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
    	</thead>
    </table>

</div>

@endsection