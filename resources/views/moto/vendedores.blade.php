@extends('templates.esqueleto')

@section('content')

<div class="container" id="main_container">

	<h1 id="titulo">Vendedores de {{$moto['marca']}} {{$moto['modelo']}}</h1>
    <input type="hidden" id="id_moto" value="{{$moto['id']}}">
	<table id="tbl_vendedores" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Acción</th>
            </tr>
    	</thead>
    </table>

    <!-- popup para borrar un vendedor -->
<!-- Modal -->
<div id="modal_borrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quitar vendedor</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea quitar el vendedor a la moto?</p>
      </div>
      <div class="modal-footer">
      <button onclick="eliminar_vendedor()" data-dismiss="modal" type="button" class="btn btn-danger" data-dismiss="modal">Quitar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<h1 id="titulo">Vendedores para agregar a la venta</h1>

<table id="tbl_vendedores_agregar" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Acción</th>
            </tr>
        </thead>
</table>

    <!-- popup para agregar un vendedor -->
<!-- Modal -->
<div id="modal_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar vendedor</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea agregar el vendedor a la moto?</p>
      </div>
      <div class="modal-footer">
      <button onclick="agregar_vendedor()" data-dismiss="modal" type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

</div>

@endsection