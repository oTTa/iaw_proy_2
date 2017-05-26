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
								<p style="color:red; display: none" id="error"></p>
								<button class="btn btn-default" onclick=""><i class="fa fa-file-pdf-o" aria-hidden="true">
								</i> Descargar PDF</button>
								@if ($compra['token_compartir']==null)
									<button class="btn btn-success" onclick="compartir(this,{{$compra['id']}})"><i class="fa fa-share-alt" aria-hidden="true"></i> Compartir</button>
									<p id="url_compartida" style="margin-top: 10px; display: none">
								@else
									<button class="btn btn-danger" onclick="no_compartir(this,{{$compra['id']}})"><i class="fa fa-share-alt" aria-hidden="true"></i> Dejar de Compartir</button> 
									<p id="url_compartida{{$compra['id']}}" style="margin-top: 10px;"><strong>Url compartida:</strong> <a href="{{url('/')}}/compras/compartida/{{$compra['token_compartir']}}">{{url('/')}}/compras/compartida/{{$compra['token_compartir']}} </a></p>
								@endif
							</center>
							
						</div>
						
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection