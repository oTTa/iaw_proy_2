@extends('templates.esqueleto')

@section('content')

	

<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
	        <div class="col-md-5 col-md-offset-4">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <i class="fa fa-briefcase" aria-hidden="true"></i> Crear Vendedor</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" role="form" novalidate>
							<p id="error_general" style="display: none; color: red"></p>
							<input type="hidden" id="id" value="{{$id}}">
	                        <div class="form-group control-group">
	                            <label for="nombre" class="col-md-3 control-label">
	                                Nombre</label>
	                            <div class="col-md-9 controls">
	                                <input type="text" class="form-control" id="nombre" placeholder="Nombre"
	                                data-validation-required-message="Debes ingresar el nombre de la empresa" 
	                                required>
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="direccion" class="col-md-3 control-label">
	                                Dirección</label>
	                            <div class="col-md-9 controls">
	                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" 
	                                data-validation-required-message="Debes ingresar la dirección de la empresa" 
	                                required>
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="telefono" class="col-md-3 control-label">
	                                Telefono</label>
	                            <div class="col-md-9 controls">
	                                <input type="number" class="form-control" id="telefono" placeholder="Telefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
	                                data-validation-required-message="Completa este campo" 
	                                data-validation-number-message="El telefono debe ser un numero" 
	                                minlength="8" 
	                                data-validation-minlength-message="El telefono debe tener al menos 8 numeros">
	                            </div>
	                        </div>

	                        <div id="map" style="margin: 10px 0px 10px 0px">
	                        	<h3 class="titulo" style="margin-bottom: 10px; text-align: center;"><i class="fa fa-map-marker" aria-hidden="true"></i> Punto de venta</h3>
	                        	<div id="googleMap" style="width:100%;height:400px;"></div>
	                        	<p id="error_mapa" style="color: red; display: none"></p>
	                        </div>
							
							

	                        <div class="form-group last">
	                            <div class="col-md-12">
	                                <button type="submit" class="btn btn-success btn-block">
	                                    <i class="fa fa-briefcase" aria-hidden="true"></i> Editar vendedor</button>
	                            </div>
	                        </div>

	                        

	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>


</div>





    

     <!-- google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhRS7SnEA8mE-K-viYjtKaj659G9hqSJA&callback=initMap" async defer></script>



@endsection