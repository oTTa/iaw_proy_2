id_color=null;

function preparar_eliminar(id){
	id_color=id;
}

function eliminar_color(e){
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": base_url+"/service/color/borrar/"+id_color,
	  "method": "GET",
	}

	$.ajax(settings).done(function (response) {
		if (response.header.status=="success"){
			$("#color"+id_color).remove();
		}
	});
}