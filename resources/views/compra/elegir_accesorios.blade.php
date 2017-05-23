@extends('templates.esqueleto')

@section('content')

<div class="container" style="margin-top: 70px;" id="main_container">
<div class="row">
		<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="gallery-title">Compra de la moto {{$moto['marca']}} - {{$moto['modelo']}}</h1>
		</div>

		<input type="hidden" id="id_moto" value="{{$moto['id']}}">
		<input type="hidden" id="id_vendedor" value="{{$vendedor['id']}}">
		<input type="hidden" id="id_color" value="{{$color['id']}}">
		<p style="color:red; display: none;" id="error_compra"></p>
		<div align="center">
		<button onclick="comprar()" class="btn btn-success" data-filter="all"> Realizar Compra</button>
		</div>
		<br/>


		@foreach ($accesorios as $accesorio)

		<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe" id="accesorio{{$accesorio['id']}}">
			<img src="{{url('/')}}{{$accesorio['url_thumbnail']}}" class="img-responsive">
			<p>{{$accesorio['nombre']}}</p>
			<p>{{$accesorio['descripcion']}}</p>
			<p><strong>{{$accesorio['precio']}}</strong></p>
			<button id="boton{{$accesorio['id']}}" class="btn btn-block btn-primary" onclick="agregar_accesorio({{$accesorio['id']}})">Elegir</button>
		</div>

		@endforeach

	</div>
</div>

@endsection