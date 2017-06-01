@extends('templates.esqueleto')

@section('content')

<div class="container" style="margin-top: 70px;" id="main_container">
<div class="row">
		<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="gallery-title">Compra de la moto {{$moto['marca']}} - {{$moto['modelo']}}</h1>
		</div>
		
		<center style="margin-bottom:15px">
			<img src="{{url('/')}}{{$color['url_imagen']}}" class="img-responsive" style="max-width: 400px">
			<span id="total" class="label label-info" style="font-size: 18px">Total: ${{$moto['precio']}}</span>
			<input type="hidden" id="moto_precio" value="{{$moto['precio']}}">
		</center>

		<input type="hidden" id="id_moto" value="{{$moto['id']}}">
		<input type="hidden" id="id_vendedor" value="{{$vendedor['id']}}">
		<input type="hidden" id="id_color" value="{{$color['id']}}">
		<p style="color:red; display: none;" id="error_compra"></p>
		<div align="center">
			<button onclick="comprar()" class="btn btn-success" data-filter="all"> Realizar Compra</button>
		</div>
		<br/>

	
	<div id="Tab" class="col-md-12">
 <?php $i=1; ?>  
	<ul class="nav nav-tabs" style="margin-bottom: 10px;">
		@foreach ($tipo_accesorios as $tipo)
			@if ($i == 1)
				<li  class="active" >
			@else
				<li>
			@endif
                  <a  href="#{{$i}}" data-toggle="tab">{{$tipo['nombre']}}</a>
            </li>
           <?php $i++; ?>
		@endforeach
	</ul>
   <?php $i=1; ?>
         <div class="tab-content ">
		@foreach ($tipo_accesorios as $tipo)
              
                	@if ($i == 1)
						<div class="tab-pane active" id="{{$i}}">
					@else
						<div class="tab-pane" id="{{$i}}">
					@endif
                  
                    @foreach ($accesorios as $accesorio)
						@if ($accesorio['tipo'] == $tipo['nombre'])
							<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe" id="accesorio{{$accesorio['id']}}">
								<center>
								<img src="{{url('/')}}{{$accesorio['url_thumbnail']}}" class="img-responsive" style="max-width: 250px">
								<p>{{$accesorio['nombre']}}</p>
								<p>{{$accesorio['descripcion']}}</p>
								<p><strong id="precio{{$accesorio['id']}}">{{$accesorio['precio']}}</strong></p>
								<button id="boton{{$accesorio['id']}}" class="btn btn-block btn-primary" onclick="toggle_accesorio({{$accesorio['id']}})">Agregar a la compra</button>
								</center>
							</div>
						@endif

					@endforeach
                  </div>
                

          	
		<?php $i++; ?>
			
		@endforeach
		</div>
</div>

	</div>
</div>

@endsection