@extends('templates.esqueleto')

@section('content')

<div class="container" id="main_container">

	<h1 id="titulo">Usuarios</h1>

	<table id="tbl_usuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Foto perfil</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Em@il</th>
                <th>Fecha nacimiento</th>
                <th>Registro</th>
                <th>Acción</th>
            </tr>
    	</thead>
    </table>



</div>

@endsection