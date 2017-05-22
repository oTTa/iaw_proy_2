@extends('templates.esqueleto')

@section('content')



<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i></i> Crear Accesorio</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" novalidate>
							<p id="error_general" style="display: none; color: red"></p>

								<div class="form-group control-group">
									<label for="nombre" class="col-md-3 control-label">
										Nombre</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="nombre" placeholder="Nombre" 
											data-validation-required-message="Debes ingresar el nombre del accesorio" 
											required>
										</div>
								</div>

								<div class="form-group control-group">
									<label for="tipo" class="col-md-3 control-label">
										Tipo</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="tipo" placeholder="Tipo" 
											data-validation-required-message="Debes ingresar el tipo de accesorio" 
											required>
										</div>
								</div>

								<div class="form-group control-group">
									<label for="descripcion" class="col-md-3 control-label">
										Descripcion</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
										</div>
								</div>

									<div class="form-group control-group">
										<label for="precio" class="col-md-3 control-label">
											Precio <i class="fa fa-usd" aria-hidden="true"></i></label>
											<div class="col-md-9 controls">
												<input type="number" step="0.01" class="form-control" id="precio" placeholder="Precio AR$" 
												data-validation-required-message="Completa este campo correctamente"
												required>
											</div>
										</div>

										<div class="form-group required">
											<label class="col-md-4 control-label">Imagen</label>
											<div class="col-md-6">
												<input type="file" class="file" id="imagen" name="imagen" accept="image/jpeg, image/png" required>
											</div>
										</div>

										<div class="form-group last">
											<div class="col-md-12">
												<button class="btn btn-success btn-block">
													<i class="fa fa-shopping-basket" aria-hidden="true"></i></i> Crear Accesorio</button>
												</div>
											</div>



										</form>
									</div>
								</div>
							</div>
						</div>


					</div>

					@endsection





