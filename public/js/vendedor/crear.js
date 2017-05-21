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
                            	crearVendedor(marcador);
                            }
                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
});

function crearVendedor(marcador){
	data = {
		"nombre": $("#nombre").val(),
		"direccion": $("#direccion").val(),
		"telefono": $("#telefono").val(),
		"latitud": marcador.getPosition().lat(),
		"longitud": marcador.getPosition().lng()
	}

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/vendedores/crear",
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
	  }
	});
}