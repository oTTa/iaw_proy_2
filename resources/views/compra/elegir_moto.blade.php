@extends('templates.esqueleto')

@section('content')

<video id="bgvid" playsinline autoplay muted loop>
<source src="<?php echo url('/')."/videos/motos.mp4" ?>" type="video/mp4">
</video>

    <div class="container" id="box">
      
      <div id="titulo_principal" class="titulo">
        <h1>BuscoMoto</h1>
        <h2>Encuentra la tuya, a tu medida</h2>
      </div>

      <div id="moto-search" class="container col-md-12"> 
        <div id="busqueda" class="col-md-6 col-xs-12">
          <h3 class="titulo">Parametros de busqueda</h3>
          <br>
          <div id="selectores" style="text-align: center">

            <div class="form-group">
              <p style="text-align: center"><strong>Tipo</strong></p>
              <select id="tipo" class="selectpicker" data-style="btn-primary" data-live-search="true">
              </select>
            </div>

            <div class="form-group">
              <p style="text-align: center"><strong>Marca</strong></p>
              <select id="marca" class="selectpicker" data-style="btn-primary" data-live-search="true">
              </select>
            </div>

            <div class="form-group">            
              <p style="text-align: center"><strong>Cilindraje</strong></p>
              <select id="cilindraje" class="selectpicker" data-style="btn-primary" data-live-search="true">
              </select>
            </div>

            <div class="form-group">
              <p style="text-align: center"><strong>Modelo</strong></p>
              <select id="modelo" class="selectpicker" data-style="btn-primary" data-live-search="true" disabled>
              </select>
            </div>

          </div>
          
          <div>
            <p><strong>Colores:</strong></p>
            <div id="colores" class="row">
              
            </div>
          </div>

          


        </div>
        <div id="resultados" class="col-md-6 col-xs-12">
          <h3 class="titulo">Resultado de la busqueda</h3>
          
          <div id="Tab" class="col-md-12"> 

              <ul class="nav nav-tabs" style="margin-bottom: 10px;">
                <li class="active">
                  <a  href="#1" data-toggle="tab">Imagen</a>
                </li>
                <li>
                  <a href="#2" data-toggle="tab">Video</a>
                </li>
              </ul>

                <div class="tab-content ">
                  <div class="tab-pane active" id="1">
                    <img src="<?php echo url('/')."/images/moto.png";?>" class="img-thumbnail img-responsive" id="imagen_moto" alt="Moto"> 
                  </div>
                  <div class="tab-pane" id="2">
                    <div id="video_moto" class="embed-responsive embed-responsive-4by3">
                      <iframe id="video" class="embed-responsive-item" src="https://www.youtube.com/embed/gn1AeD95BxY"></iframe>
                    </div>
                  </div>
                </div>

          </div>

          <div id="estrellas" class="col-md-9">
            <span class="estrella glyphicon glyphicon-star" aria-hidden="true"></span>
            <span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            <span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            <span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            <span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>
          </div>

          <div id="precio" class="col-md-3 alert alert-info" role="alert">$0</div>
        </div>

        

        <div class="col-md-12" id="botones">
          <button type="button" class="col-md-6 col-xs-12 btn btn-danger" onclick="limpiar_busqueda();" ><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Nueva busqueda</button>
          <a href="#map"  class="col-md-6 col-xs-12 btn btn-info" ><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Ver puntos de venta</a>
          <button id="comprar" onclick="preparar_compra();" style="margin-top: 10px;" class="col-md-12 col-xs-12 btn btn-warning"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a>
       </div>

       <div class="row" id="alertas">

         <div class="col-md-12" id="vendedor_mostrar">
         
         </div>

         <div class="col-md-12" id="error_mostrar">
         
         </div>

       </div>
        
        <hr>

      </div>

      
      
      

    </div><!-- /.container -->

      <div id="map">
        <div id="titulo_ventas">
            <h3 class="titulo">Puntos de ventas</h3>
        </div>
        <div id="googleMap"></div>
      </div>



    

    <script>
      function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(-38.7197216,-62.2642744),
            zoom:14,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      }
    </script>
     <!-- google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhRS7SnEA8mE-K-viYjtKaj659G9hqSJA&callback=myMap" async defer></script>

@endsection