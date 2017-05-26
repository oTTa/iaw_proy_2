function compartir(e,id_compra){
	$("#error").hide();
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": base_url+"/service/comprar/compartir/"+id_compra,
	  "method": "GET",
	}

	$.ajax(settings).done(function (response) {
	  if (response.header.status=='success'){
	  	console.log('exito');
	  	$(e).hide();
	  	$("#url_compartida").html(response.content.token_compartir);
	  	$("#url_compartida").html('<strong>Url compartida:</strong> <a href="'+base_url+'/compras/compartida/'+response.content.token_compartir+'">'+base_url+'/compras/compartida/'+response.content.token_compartir+' </a>');
	  	$("#url_compartida").show()
	  }
	  if (response.header.status=='error'){
	  	$("#error").html(response.message);
	  	$("#error").show();
	  }
	});

}

function no_compartir(e,id_compra){
	$("#error").hide();
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": base_url+"/service/comprar/no_compartir/"+id_compra,
	  "method": "GET",
	}

	$.ajax(settings).done(function (response) {
	  if (response.header.status=='success'){
	  	$(e).hide();
	  	$("#url_compartida"+id_compra).hide();
	  }
	  if (response.header.status=='error'){
	  	$("#error").html(response.message);
	  	$("#error").show();
	  }
	});

}