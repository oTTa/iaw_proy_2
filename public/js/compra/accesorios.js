accesorios=[];

function agregar_accesorio(id){
	accesorios.push(id);
	$('#boton'+id).hide();
	$('#accesorio'+id).css("background-color","#44836a");;
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