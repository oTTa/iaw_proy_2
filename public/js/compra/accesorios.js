$( document ).ready(function() {
    accesorios=[];
	total=$('#moto_precio').val();
});

function toggle_accesorio(id){
	precio = $('#precio'+id).text();
	var index = accesorios.indexOf(id);
	if (index >= 0) {
		total = parseFloat(total)-parseFloat(precio);
		$('#total').text("Total: " +total);
    	accesorios.splice(index, 1);
    	$('#boton'+id).removeClass();
    	$('#boton'+id).addClass('btn btn-block btn-primary');
    	$('#boton'+id).text("Agregar a la compra");
    	$('#accesorio'+id).css("background-color","#ffffff");
	}
	else
	{
		total = parseFloat(total)+parseFloat(precio);
		$('#total').text("Total: " +total);
		accesorios.push(id);
    	$('#boton'+id).removeClass();
    	$('#boton'+id).addClass('btn btn-block btn-danger');
		$('#boton'+id).text("Quitar de la compra");
		$('#accesorio'+id).css("background-color","#e0e0e0");
	}
}

function comprar(){
	id_color = $('#id_color').val();
	id_vendedor = $('#id_vendedor').val();
	id_moto = $('#id_moto').val();
	data=
	{
		"id_color" : id_color,
		"id_vendedor" : id_vendedor,
		"id_moto" : id_moto,
		'accesorios': accesorios
	};
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": base_url+"/service/comprar/realizar_compra",
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
		$("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'" class="alert-link">Inicio</a></div>');
	  }
	  else{
	  	$("#error_general").text(response.header.message)
	  }
	});
}