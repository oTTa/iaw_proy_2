$( document ).ready(function() {
     $(".form-horizontal").find("input,textarea,select").jqBootstrapValidation(
     {
                        preventSubmit: true,
                        submitError: function($form, event, errors) {
                            //se puede usar para hacer logs
                        },
                        submitSuccess: function($form, event) {
                            event.preventDefault();
                            marcador= getMarcador();

                            if (marcador==null){
                            	$("#error_mapa").text("Debes seleccionar un punto de venta");
                            	$("#error_mapa").show();
                            }
                            else{
                            	$("#error_mapa").hide();
                            	editarVendedor(marcador);
                            }
                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
    completarFormulario();
});

function editarVendedor(marcador){
	$("#error_general").show();
	data = {
		"id" : $("#id").val(),
		"nombre": $("#nombre").val(),
		"direccion": $("#direccion").val(),
		"telefono": $("#telefono").val(),
		"latitud": marcador.getPosition().lat(),
		"longitud": marcador.getPosition().lng()
	}

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/vendedores/editar",
		"method": "POST",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false,
		"data": JSON.stringify(data)
	}

	$.ajax(settings).done(function (response) {
	  if (response.header.status=="success")
	  {
	  	$("#main_container").empty();
		$("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'/vendedores/listar'+'" class="alert-link">Ver vendedores</a></div>');
	  }
	  else{
	  	$("#error_general").text(response.header.message)
	  	$("#error_general").show();
	  }
	});
}

function completarFormulario() {
	id = $("#id").val();

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/vendedores/"+id,
		"method": "GET",
	}

	$.ajax(settings).done(function (response) {
		$("#nombre").val(response.content.nombre);
		$("#direccion").val(response.content.direccion);
		$("#telefono").val(response.content.telefono);
		position =new google.maps.LatLng(response.content.latitud,response.content.longitud);
		mapa=getMapa();
		addMarker(position, mapa)
	});

}