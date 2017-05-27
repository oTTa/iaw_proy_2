<div class="container" style="margin-top: 70px;" id="main_container">
	<div class="panel panel-primary">
	<div class="panel-heading">
		<center>
			<h2>Compra de {{$compra['usuario']['nombre']}} {{$compra['usuario']['apellido']}}</h2>
			<img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>{{$compra['usuario']['url_foto_perfil']}}" class="img-responsive" style="max-height: 150px;">
		</center>
	</div>
		<div class="panel-body">
			<div class="list-group">

					<div  class="list-group-item">
						<center><h2 class="list-group-item-heading">{{$compra['moto']['marca']}} - {{$compra['moto']['modelo']}}</h2></center>
						<div class="list-group-item-text">
							<center>
								<img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>{{$compra['moto']->color->url_thumbnail}}" class="img-responsive" style="max-height: 300px;">
								<p><strong>Precio:</strong> ${{$compra['moto']->precio}}</p>
								<?php $total=$compra['moto']->precio ?>
							</center>
							<hr>
							<center>
									<p><strong>Accesorios</strong></p>
									@foreach ($compra['accesorios'] as $accesorio)
									
									<img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>{{$accesorio->url_thumbnail}}" class="img-responsive" style="max-height: 150px;">
										<p>{{$accesorio->nombre}} - ${{$accesorio->precio}}</p>
										<?php $total+=$accesorio->precio; ?>
									@endforeach
							</center>
							<center id="precio">
								<span class="label label-primary" >TOTAL: ${{$total}}</span>
							</center>	
							
						</div>
						
					</div>
			</div>
		</div>
	</div>
</div>