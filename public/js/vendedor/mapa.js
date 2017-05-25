var marcador=null;
var mapa=null;

function initMap() {
        var mapProp= {
            center:new google.maps.LatLng(-38.7197216,-62.2642744),
            zoom:14,
        };
         mapa=new google.maps.Map(document.getElementById("googleMap"),mapProp);
         mapa.addListener('click', function(e) {
    	addMarker(e.latLng, mapa);
      	});
}

function limpiar_mapa(){
	if (marcador!=null){
		marcador.setMap(null);
		marcador=null;
	}
}

function addMarker(position, mapa) {
	limpiar_mapa();

    var marker = new google.maps.Marker({
        position: {lat: -34.397, lng: 150.644},
        map: mapa
    });

    marcador=marker;
}

function getMarcador(){
	return marcador;
}

function getMapa(){
	return mapa;
}