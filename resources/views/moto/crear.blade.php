@extends('templates.esqueleto')

@section('content')

	

<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
	        <div class="col-md-5 col-md-offset-4">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <i class="fa fa-motorcycle" aria-hidden="true"></i> Crear Moto</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" role="form" novalidate>
							<p id="error_general" style="display: none; color: red"></p>
	                        <div class="form-group control-group">
	                            <label for="tipo" class="col-md-3 control-label">
	                                Tipo</label>
	                            <div class="col-md-9 controls">
	                                <input type="text" class="form-control" id="tipo" placeholder="Tipo"
	                                data-validation-required-message="Debes ingresar el tipo de moto, por ejemplo cross" 
	                                required>
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="marca" class="col-md-3 control-label">
	                                Marca</label>
	                            <div class="col-md-9 controls">
	                                <input type="text" class="form-control" id="marca" placeholder="Marca" 
	                                data-validation-required-message="Debes ingresar la marca de la moto" 
	                                required>
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="cilindraje" class="col-md-3 control-label">
	                                Cilindraje</label>
	                            <div class="col-md-9 controls">
	                                <input type="number" class="form-control" id="cilindraje" placeholder="Cilindraje" onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
	                                data-validation-required-message="Completa este campo" 
	                                data-validation-number-message="El cilindraje debe ser un numero" 
	                                minlength="2" 
	                                data-validation-minlength-message="El cilindraje debe tener al menos 2 numeros">
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="modelo" class="col-md-3 control-label">
	                                Modelo</label>
	                            <div class="col-md-9 controls">
	                                <input type="text" class="form-control" id="modelo" placeholder="Modelo" 
	                                data-validation-required-message="Debes ingresar el Modelo de la moto" 
	                                required>
	                            </div>
	                        </div>

							<div class="form-group control-group">
	                            <label for="precio" class="col-md-3 control-label">
	                                Precio <i class="fa fa-usd" aria-hidden="true"></i></label>
	                            <div class="col-md-9 controls">
	                                <input type="number" class="form-control" id="precio" placeholder="Precio AR$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
	                                data-validation-required-message="Completa este campo" 
	                                data-validation-number-message="El precio debe ser un numero" 
	                                minlength="4" 
	                                data-validation-minlength-message="El precio debe tener al menos 4 numeros">
	                            </div>
	                        </div>

	                        <div class="form-group control-group">
	                            <label for="url" class="col-md-3 control-label">
	                                Url <i class="fa fa-youtube-play" aria-hidden="true"></i></label>
	                            <div class="col-md-9 controls">
	                                <input type="url" class="form-control" id="url" placeholder="Url YouTube" 
	                                data-validation-required-message="Debes ingresar la url del video de <a target='_blank' href='https://www.youtube.com/'><i class='fa fa-youtube' style='font-size:36px; color:red;' aria-hidden='true'></i></a>" 
	                                required>
	                            </div>
	                        </div>
							
							<div class="form-group control-group">
	                            <label for="rating" class="col-md-3 control-label">
	                                Rating <i class="fa fa-star" aria-hidden="true"></i></label>
	                            <div class="col-md-9 controls">
	                            	<select class="form-control" id="rating">
	                            		<option>1</option>
	                            		<option>2</option>
	                            		<option>3</option>
	                            		<option>4</option>
	                            		<option>5</option>
	                            	</select>
	                            </div>
	                        </div>

	                        <div class="form-group last">
	                            <div class="col-md-12">
	                                <button type="submit" class="btn btn-success btn-block">
	                                    <i class="fa fa-motorcycle" aria-hidden="true"></i> Crear moto</button>
	                            </div>
	                        </div>

	                        

	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>


</div>




@endsection
      
    



