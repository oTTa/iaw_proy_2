@extends('templates.esqueleto')

@section('content')

	

<div class="container" style="margin-top: 70px;" id="main_container">

	<div class="row">
		<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="gallery-title">{{$moto['marca']}} - {{$moto['modelo']}}</h1>
		</div>

		<div align="center">
		<a href="{{url('/')}}/motos/colores/agregar/{{$moto['id']}}" class="btn btn-success" data-filter="all"><i class="fa fa-picture-o" aria-hidden="true"></i> Agregar color</a>
		</div>
		<br/>


		@foreach ($moto['colores'] as $color)

		<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe" id="color{{$color['id']}}">
			<img src="{{url('/')}}{{$color['url_thumbnail']}}" class="img-responsive">
			<button class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal_borrar" onclick="preparar_eliminar({{$color['id']}})">Borrar</button>
		</div>

		@endforeach

	</div>
	
	<!-- popup para borrar color -->
	<!-- Modal -->
	<div id="modal_borrar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Borrar Color</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea borrar el color?</p>
	      </div>
	      <div class="modal-footer">
	      <button onclick="eliminar_color(this)" data-dismiss="modal" type="button" class="btn btn-danger" data-dismiss="modal">Borrar</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>

	  </div>
	</div>

</div>





@endsection