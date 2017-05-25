@extends('templates.esqueleto')

@section('content')

<div class="container" style="margin-top: 70px;" id="main_container">
	<div class="panel panel-primary">
	<div class="panel-heading">Compras</div>
		<div class="panel-body">
			<div class="list-group">
				@foreach ($compras as $compra)

					<div  class="list-group-item">
						<center><h2 class="list-group-item-heading">{{$compra['moto'][0]->marca}} - {{$compra['moto'][0]->modelo}}</h2></center>
						<div class="list-group-item-text">
							<center>
								<img src="{{url('/')}}{{$compra['moto'][0]->color->url_thumbnail}}" class="img-responsive" style="max-height: 100px;">
								<p><strong>Precio:</strong> ${{$compra['moto'][0]->precio}}</p>
								<?php $total=$compra['moto'][0]->precio ?>
							</center>
							<hr>
							<center>
									<p><strong>Accesorios</strong></p>
									@foreach ($compra['accesorios'] as $accesorio)
										<p>{{$accesorio->nombre}} - ${{$accesorio->precio}}</p>
										<?php $total+=$accesorio->precio; ?>
									@endforeach
							</center>
							<center id="precio">
								<span class="label label-primary" >TOTAL: ${{$total}}</span>
							</center>
	
							<center id="acciones">
								<button class="btn btn-default" onclick=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF</button>
								<button class="btn btn-success" onclick=""><i class="fa fa-share-alt" aria-hidden="true"></i> Compartir</button>
							</center>
							
						</div>
						
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection