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

    <!-- popup para borrar moto -->
<!-- Modal -->
<div id="modal_borrar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Borrar accesorio</h4>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea borrar el accesorio?</p>
      </div>
      <div class="modal-footer">
      <button onclick="eliminar_accesorio()" data-dismiss="modal" type="button" class="btn btn-danger" data-dismiss="modal">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

</div>

@endsection