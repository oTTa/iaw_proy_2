var motos_json ;

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://iawproy2.com/service/motos/listar",
  "method": "GET",
  "headers": {}
}

$.ajax(settings).done(function (response) {
  motos_json=response.content;
  cargar_datos(motos_json);
    $('#tipo').change(function () {
    	filtrar(motos_json);
    });
    $('#marca').change(function () {
    	filtrar(motos_json);
    });
    $('#cilindraje').change(function () {
    	filtrar(motos_json);
    });
    $('#modelo').change(function () {
    	filtrar(motos_json);
    });
});


var color_select = 0;
var moto_select = null;
var vendedor_select = null;
var color_select = null;
var marcadores = [];

var marcas = [];
var tipos = [];
var cilindrajes = [];

$(document).ready(function() {
	
});

function cargar_datos(){
	var motos = motos_json;
	$("#tipo").empty();
	$("#marca").empty();
	$("#cilindraje").empty();
	$("#modelo").empty();
	marcas = [];
    tipos = [];
    cilindrajes = [];

	$("#tipo").append('<option data-tokens=""></option>');
	$("#marca").append('<option data-tokens=""></option>');
	$("#cilindraje").append('<option data-tokens=""></option>');
	$("#modelo").append('<option data-tokens=""></option>');
	for (var i = 0; i < motos.length; i++) {
		if (!existe_opcion(tipos,motos[i].tipo)){
			$("#tipo").append('<option data-tokens="' + motos[i].tipo + '">' + motos[i].tipo + '</option>');
			tipos.push(motos[i].tipo);
		}
		if (!existe_opcion(marcas,motos[i].marca)){
			$("#marca").append('<option data-tokens="' + motos[i].marca + '">' + motos[i].marca + '</option>');
			marcas.push(motos[i].marca);
		}
		if (!existe_opcion(cilindrajes,motos[i].cilindraje)){
			$("#cilindraje").append('<option data-tokens="' + motos[i].cilindraje + '">' + motos[i].cilindraje + 'cc</option>');
			cilindrajes.push(motos[i].cilindraje);
		}
	}
	$("#tipo").selectpicker('refresh');
	$("#marca").selectpicker('refresh');
	$("#cilindraje").selectpicker('refresh');
	$("#modelo").selectpicker('refresh');
}

function limpiar_busqueda(){
	cargar_datos();
	$("#imagen_moto").attr("src", "images/moto.png");
	$("#video").attr("src", "https://www.youtube.com/embed/gn1AeD95BxY");
	$("#precio").text("$0");
	$("#colores").empty();
	$("#estrellas").empty();
	for (var j = 0; j < 5; j++) {
		$("#estrellas").append('<span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>');
	}
	color_select = 0;
	moto_select = null;
	color_select = null;
	vendedor_select=null;
	$("#vendedor_mostrar").empty();
	$("#descargar_moto").removeAttr('download');
	$("#descargar_moto").removeAttr('href');
	$("#descargar_json").removeAttr('href');
	$("#modelo").attr('disabled',true);
	$('#modelo').selectpicker('refresh');
	limpiar_mapa();
}

function filtrar(motos){
	var tipo = $("#tipo").find("option:selected").data("tokens");
	var marca = $("#marca").find("option:selected").data("tokens");
	var cilindraje = $("#cilindraje").find("option:selected").data("tokens");
	var modelo = $("#modelo").find("option:selected").data("tokens");

	$("#tipo").empty();
	$("#marca").empty();
	$("#cilindraje").empty();
	$("#modelo").empty();
	marcas = [];
    tipos = [];
    cilindrajes = [];

	if (tipo=="") 
		$("#tipo").append('<option data-tokens=""></option>');

	if (marca=="")
		$("#marca").append('<option data-tokens=""></option>');

	if (cilindraje=="")
		$("#cilindraje").append('<option data-tokens=""></option>');	

	if (modelo==""){
		$("#modelo").append('<option data-tokens=""></option>');

		for (var i = 0; i < motos.length; i++) {
			if (cumple_filtrado(motos[i], tipo, marca, cilindraje)){

					if (!existe_opcion(tipos,motos[i].tipo)){
						$("#tipo").append('<option data-tokens="' + motos[i].tipo + '">' + motos[i].tipo + '</option>');
						tipos.push(motos[i].tipo);
					}
					if (!existe_opcion(marcas,motos[i].marca)){
						$("#marca").append('<option data-tokens="' + motos[i].marca + '">' + motos[i].marca + '</option>');
						marcas.push(motos[i].marca);
					}
					if (!existe_opcion(cilindrajes,motos[i].cilindraje)){
						$("#cilindraje").append('<option data-tokens="' + motos[i].cilindraje + '">' + motos[i].cilindraje + 'cc</option>');
						cilindrajes.push(motos[i].cilindraje);
					}

					if(tipo!="" && marca!="" && cilindraje!=""){
						$("#modelo").removeAttr('disabled');
						$("#modelo").append('<option data-tokens="' + motos[i].modelo + '">' + motos[i].modelo + '</option>');
					}
			}
		}
	
		$("#tipo").selectpicker('refresh');
		$("#marca").selectpicker('refresh');
		$("#cilindraje").selectpicker('refresh');
		$("#modelo").selectpicker('refresh');
	}
	else{
		var i=0;
		encontre = false;
		while (!encontre && i<motos.length) {
			if (es_moto_seleccionada(motos[i], tipo, marca, cilindraje,modelo)){
				encontre=true;
				moto_select=motos[i];

				$("#1").slideUp(200,function() {
					  	$("#imagen_moto").attr("src", moto_select.colores[color_select].url_thumbnail);
					    $('#1').slideDown(200,function(){
					    	$('#1').css('display', '');
					    });
   				});

				$("#video").attr("src", motos[i].url_video);
				$("#precio").text('$'+motos[i].precio);
				$("#estrellas").empty();
				$("#descargar_json").attr('href',"data:text/plain;charset=UTF-8," + encodeURIComponent(JSON.stringify(moto_select,null,2)));

				for (var j = 0; j < motos[i].rating; j++) {
					$("#estrellas").append('<span class="estrella glyphicon glyphicon-star" aria-hidden="true"></span>');
				}
				for (var j = 0; j < (5-motos[i].rating); j++) {
					$("#estrellas").append('<span class="estrella glyphicon glyphicon-star-empty" aria-hidden="true"></span>');
				}

				for (var j = 0; j < motos[i].colores.length; j++) {
					$("#colores").append('<div id="color'+j+'" data-color="'+j+'" class="box_color"></div>');
					$("#color"+j).css('background-color', motos[i].colores[j].rgb);

					$("#color"+j).click(function() {
					  var color= $(this).data("color");

					  $("#1").slideUp(200,function() {
					  	$("#imagen_moto").attr("src", moto_select.colores[color].url_thumbnail);
					    $('#1').slideDown(200,function(){
					    	$('#1').css('display', '');
					    });

   				  	  });

					  
					  $(this).css('border', '3px solid #009999');
					  $("#color"+color_select).css('border', '1px solid black');
					  //$("#descargar_moto").attr('href',moto_select.colores[color].rgb);
					  color_select= color;
					});

					if (j==0){
						color_select = 0;
						$("#color"+0).css('border', '3px solid #009999');
						$("#descargar_moto").attr('download',true);
						$("#descargar_moto").attr('href',moto_select.colores[0].url_thumbnail);
					}
				}

				agregar_venderdores_mapa(motos[i].vendedores);
			}
			i++;
		}
	}

}

function cumple_filtrado(moto, tipo, marca, cilindraje){
	if ((moto.tipo==tipo || tipo=="") && (moto.marca==marca || marca=="") && (moto.cilindraje==cilindraje || cilindraje==""))
		return true;
	else
		return false;
}

function es_moto_seleccionada(moto, tipo, marca, cilindraje, modelo){
	if (moto.tipo==tipo && moto.marca==marca && moto.cilindraje==cilindraje && moto.modelo==modelo)
		return true;
	else
		return false;
}

function agregar_venderdores_mapa(vendedores){
	limpiar_mapa();
	var mapCanvas = document.getElementById("googleMap");
	var centrado = new google.maps.LatLng(vendedores[0].latitud,vendedores[0].longitud);
	var mapOptions = {center: centrado, zoom: 15};
	map = new google.maps.Map(mapCanvas, mapOptions);
	var html;
	var icon = {
		    url: base_url+"/images/marker_moto.png", // url
		    scaledSize: new google.maps.Size(50, 50), // scaled size
		    origin: new google.maps.Point(0,0), // origin
		    anchor: new google.maps.Point(0, 0) // anchor
	};

	for (var i = 0; i < vendedores.length; i++) {
		var marker;
		var myCenter = new google.maps.LatLng(vendedores[i].latitud,vendedores[i].longitud);
		html = preparar_info_window(vendedores[i]);
						  
		var infowindow = new google.maps.InfoWindow();

		

		marker = new google.maps.Marker({
						  					position:myCenter,
						  					icon: icon,
						  					contentString: html,
						  					map: map,
				  						});
						 
		var infowindow = new google.maps.InfoWindow({});

		marker.addListener('click', function() {
		    infowindow.setContent(this.contentString);
		    infowindow.open(map, this);
		});

		marcadores.push(marker);
	}

}

function preparar_info_window(vendedor){
	html="<h3 style='text-aling:center'>"+vendedor.nombre+"</h3>";
	html+="<p><strong>Telefono:</strong> "+vendedor.telefono+"</p>";
	html+="<p><strong>Dirección:</strong> "+vendedor.direccion+"</p>";
	html+='<button id="comprar" onclick="elegir_vendedor('+vendedor.id+');" style="margin-top: 10px;" class="btn btn-primary">Elegir</a>';
	
	return html;
}

function preparar_compra(){
	if (moto_select==null){
		var html='<div style="text-align: center" class="alert alert-danger" role="alert">';
		html+='<h3 >Error</h3>';
		html+='<strong><p>Debes seleccionar una moto para realizar la compra</p></strong>';
		$("#error_mostrar").html(html);
	}
	else{
		if (vendedor_select==null){
			var html='<div style="text-align: center" class="alert alert-danger" role="alert">';
			html+='<h3 >Error</h3>';
			html+='<strong><p>Debes seleccionar un vendedor para realizar la compra</p></strong>';
			$("#error_mostrar").html(html);
		}
		else{
			window.location.href = base_url+"/motos/"+moto_select.id+"/colores/"+moto_select.colores[color_select].id+"/vendedores/"+vendedor_select.id+"/preparar_compra";
		}
	}
}

function elegir_vendedor(id){
	$("#vendedor_mostrar").empty();
	$("#error_mostrar").empty();
	i=0;
	encontre=false;
	while (!encontre && i<moto_select.vendedores.length){
		if (moto_select.vendedores[i].id==id){
			encontre=true;
			vendedor_select=moto_select.vendedores[i];
		}
		i++;
	}
	var html='<div style="text-align: center" class="alert alert-info" role="alert">';
	html+='<h3 >Vendedor</h3>';
	html+='<strong><p>'+vendedor_select.nombre+'</p></strong>';
	html+='<p>Telefono: '+vendedor_select.telefono+'</p>';
	html+='<p>Dirección: '+vendedor_select.direccion+'</p>';
	html+='</div>';
	$("#vendedor_mostrar").html(html);
}

function limpiar_mapa(){
	var marcador = marcadores.pop();
	while (marcador!=null){
		marcador.setMap(null);
		var marcador = marcadores.pop();
	}
}

function existe_opcion(opciones,valor){
	var existe=false;
	i=0;
	while (i<opciones.length && !existe) {
        if(opciones[i]==valor)
        	existe=true;
        i++;
    }
    return existe
}