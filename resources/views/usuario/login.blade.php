@extends('templates.esqueleto')

@section('content')



<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-user" aria-hidden="true"></i> Login
				</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" novalidate>
							<p id="error_general" style="display: none; color: red"></p>

	
								<div class="form-group control-group">
									<label for="email" class="col-md-3 control-label">
										Em@il</label>
										<div class="col-md-9 controls">
											<input type="email" class="form-control" id="email" placeholder="Email" 
											data-validation-required-message="Debes ingresar el Email" 
											data-validation-email-message="Formato incorrecto de Email"
											required>
										</div>
								</div>

								<div class="form-group control-group">
									<label for="contraseña" class="col-md-3 control-label">
										Contraseña</label>
										<div class="col-md-9 controls">
											<input type="password" class="form-control" name="password" id="password" placeholder="contraseña" 
											data-validation-required-message="Debes ingresar una contraseña" 
											required>
										</div>
								</div>

										<div class="form-group last">
											<div class="col-md-12">
												<button class="btn btn-success btn-block">
													<i class="fa fa-user" aria-hidden="true"></i> Login</button>
												</div>
											</div>



										</form>
									</div>
								</div>
							</div>
						</div>


					</div>

@endsection