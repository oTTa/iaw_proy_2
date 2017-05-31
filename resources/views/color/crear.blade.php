@extends('templates.esqueleto')

@section('content')

	

<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
	        <div class="col-md-5 col-md-offset-4">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <i class="fa fa-picture-o" aria-hidden="true"></i> Crear color</div>
	                <div class="panel-body">
	                    <div class="form-horizontal" role="form">
							<p id="error_general" style="display: none; color: red"></p>
							<input type="hidden" id="id_moto" value="{{$id}}">
	                        
							<div class="form-group required">
								<label class="col-md-4 control-label">Imagen</label>
								<div class="col-md-6">
									<input type="file" class="file" id="imagen" name="imagen" accept="image/jpeg, image/png" required>
								</div>
							</div>

							<div class="form-group required">
								<label class="col-md-4 control-label">Color</label>
								<div class="col-md-6">
									<input type="text" id="color" required>
								</div>
							</div>

	                        <div class="form-group last">
	                            <div class="col-md-12">
	                                <button id="boton_crear" onclick="crearcolor()" class="btn btn-success btn-block">
	                                    <i class="fa fa-picture-o" aria-hidden="true"></i> Crear color</button>
	                                    <center id="spinner" style="display: none">
													<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
													<span class="sr-only">Loading...</span>
												</center>
	                            </div>
	                        </div>

	                        

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>


</div>

 <script>
    var picker = new CP(document.querySelector('input[id="color"]'));
    picker.on("change", function(color) {
        this.target.value = '#' + color;
        $("#color").css("background-color",'#' + color);
    });
</script>

@endsection
      
    



