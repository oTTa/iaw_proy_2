$(document).ready(function() {
    llenarMapa();
});

function llenarMapa(){
    var settings = {
    "async": true,
    "crossDomain": true,
    "url": base_url+"/service/vendedores/listar",
    "method": "GET"
  }

  $.ajax(settings).done(function (response) {
    vendedores = response.content;
    for (var i = 0; i < vendedores.length; i++) {
        addMarker(vendedores[i],mapa);
    }
  });
}

var mapa=null;

function initMap() {
        var mapProp= {
            center:new google.maps.LatLng(-38.7197216,-62.2642744),
            zoom:14,
        };
         mapa=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}



function addMarker(vendedor, mapa) {
    var marker = new google.maps.Marker({
        position: {lat: parseFloat(vendedor.latitud), lng: parseFloat(vendedor.longitud)},
        map: mapa,
        contentString: preparar_info_window(vendedor)
    });

    var infowindow = new google.maps.InfoWindow({});
    marker.addListener('click', function() {
        infowindow.setContent(this.contentString);
        infowindow.open(mapa, this);
    });
}

function preparar_info_window(vendedor){
  html="<h3 style='text-aling:center'>"+vendedor.nombre+"</h3>";
  html+="<p><strong>Telefono:</strong> "+vendedor.telefono+"</p>";
  html+="<p><strong>Dirección:</strong> "+vendedor.direccion+"</p>";
  html+='<a href="'+base_url+'/vendedores/editar/'+vendedor.id+'" style="margin-top: 10px;" class="btn btn-primary">Editar</a>';
  return html;
}