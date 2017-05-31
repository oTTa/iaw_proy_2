@extends('templates.esqueleto')

@section('content')



<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
		<div class="col-md-5 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-user" aria-hidden="true"></i> Registrarse
				</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" novalidate>
							<p id="error_general" style="display: none; color: red"></p>

								<div class="form-group control-group">
									<label for="nombre" class="col-md-3 control-label">
										Nombre</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="nombre" placeholder="Nombre" 
											data-validation-required-message="Debes ingresar el nombre" 
											required>
										</div>
								</div>

								<div class="form-group control-group">
									<label for="apellido" class="col-md-3 control-label">
										Apellido</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="apellido" placeholder="Apellido" 
											data-validation-required-message="Debes ingresar el apellido" 
											required>
										</div>
								</div>

								<div class="form-group control-group">
									<label for="tipo" class="col-md-3 control-label">
										Fecha nacimiento</label>
										<div class="col-md-9 controls">
											<input type="text" class="form-control" id="fecha_nacimiento" placeholder="Fecha nacimiento" 
											data-validation-required-message="Debes ingresar el tipo de accesorio" 
											required>
										</div>
								</div>

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

								<div class="form-group control-group">
									<label for="contraseña" class="col-md-3 control-label">
										Contraseña</label>
										<div class="col-md-9 controls">
											<input type="password" class="form-control" id="password_repetida" placeholder="Repetir contraseña"
											data-validation-match-match="password"
											data-validation-match-message="las contraseñas no coinciden" 
											data-validation-required-message="Debes repetir la contraseña" 
											required>
										</div>
								</div>


										<div class="form-group required">
											<label class="col-md-4 control-label">Foto perfil</label>
											<div class="col-md-6">
												<input type="file" class="file" id="imagen" name="imagen" accept="image/jpeg, image/png" required>
											</div>
										</div>

										<div class="form-group last">
											<div class="col-md-12">
												<button id="boton_crear" class="btn btn-success btn-block">
													<i class="fa fa-user" aria-hidden="true"></i> Registrarse</button>
												<center id="spinner" style="display: none">
													<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
													<span class="sr-only">Loading...</span>
												</center>
												</div>
											</div>



										</form>
									</div>
								</div>
							</div>
						</div>


					</div>

					<script type="text/javascript">
						$( document ).ready(function() {
							$.datepicker.regional['es-AR'] = {"Name":"es-AR","closeText":"Close","prevText":"Prev","nextText":"Next","currentText":"Today","monthNames":["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre",""],"monthNamesShort":["ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic",""],"dayNames":["domingo","lunes","martes","miércoles","jueves","viernes","sábado"],"dayNamesShort":["dom","lun","mar","mié","jue","vie","sáb"],"dayNamesMin":["do","lu","ma","mi","ju","vi","sá"],"dateFormat":"dd-mm-yy","firstDay":0,"isRTL":false};
							$.datepicker.setDefaults($.datepicker.regional['es-AR']);
						});
					</script>
					<script>
						$( function() {
							$( "#fecha_nacimiento" ).datepicker({
								changeMonth: true,
								changeYear: true,
								yearRange: "-100:+0"
							});
						} );
					</script>

@endsection