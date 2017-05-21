@extends('templates.esqueleto')

@section('content')

<div class="container" id="main_container">

	<h1 id="titulo">Motos</h1>

	<table id="tbl_vendedores" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Cilindraje</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Video</th>
                <th>Rating</th>
                <th>Visible</th>
                <th>Fecha Alta</th>
                <th>Acción</th>
            </tr>
    	</thead>
    </table>

</div>

<!-- popup para borrar moto -->
<!-- Modal -->
<div id="modal_borrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Borrar Moto</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea borrar la moto?</p>
      </div>
      <div class="modal-footer">
      <button onclick="eliminar_moto()" data-dismiss="modal" type="button" class="btn btn-danger" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- popup para cambiar la visibilidad moto -->
<!-- Modal -->
<div id="modal_visibilidad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cambiar visibilidad de la Moto</h4>
      </div>
      <div class="modal-body">
        <p>Vas a cambiar la visibilidad de la moto, ¿Desea continuar?</p>
      </div>
      <div class="modal-footer">
      <button onclick="cambiar_visibilidad()" data-dismiss="modal" type="button" class="btn btn-success" data-dismiss="modal">Continuar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>



@endsection
