@extends('templates.esqueleto')

@section('content')

<div class="container" style="margin-top: 70px;" id="main_container">
	<div class="panel panel-primary">
	<div class="panel-heading">Perfil</div>
		<div class="panel-body">
			<div class="list-group">

					<div  class="list-group-item">
						<center><h2 class="list-group-item-heading">{{$usuario['nombre']}} {{$usuario['apellido']}}</h2></center>
						<div class="list-group-item-text">
							<center>
								<img src="{{url('/')}}{{$usuario['url_foto_perfil']}}" class="img-responsive" style="max-height: 350px;">
								<br>
								<p><strong>Email:</strong> {{$usuario['email']}}</p>
								<p><strong>Fecha nacimiento:</strong> 
									<?php 
										$date = date_create($usuario['fecha_nacimiento']);
										echo date_format($date, 'd-m-Y');
									 ?>
								 </p>
							</center>
							
						</div>
						
					</div>
			</div>
		</div>
	</div>
</div>

@endsection