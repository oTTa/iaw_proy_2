$( document ).ready(function() {
     $(".form-horizontal").find("input,textarea,select").jqBootstrapValidation(
     {
                        preventSubmit: true,
                        submitError: function($form, event, errors) {
                            //se puede usar para hacer logs
                        },
                        submitSuccess: function($form, event) {
                            event.preventDefault();
                            crearMoto();

                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
     autocompletar_tipo();
     autocompletar_marca();
});

function crearMoto(){
	data = {
		"tipo": $("#tipo").val(),
		"marca": $("#marca").val(),
		"cilindraje": $("#cilindraje").val(),
		"modelo": $("#modelo").val(),
		"precio": $("#precio").val(),
		"url_video": $("#url").val(),
		"rating": $( "#rating option:selected" ).val()
	}
	console.log(data);

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/motos/crear",
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
		$("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'/motos/listar'+'" class="alert-link">Ver Motos</a></div>');
	  }
	  else{
	  	$("#error_general").text(response.header.message)
	  }
	});
}

function autocompletar_tipo (){
      var cache = {};
      $( "#tipo" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
                    var term = request.term;
                    if ( term in cache ) {
                      response( cache[ term ] );
                      return;
                    }
             
                    $.getJSON( base_url+"/service/motos/tipos/"+$("#tipo").val(), request, function( data, status, xhr ) {
                      cache[ term ] = data.content;
                      response( data.content );
                    })
              },
        select: function( event, ui ) {
          var size = 0, key;
          for (key in ui.item) {
            if (ui.item.hasOwnProperty(key)) size++;
          } 
          if (size>0){
            $("#tipo").val( ui.item.nombre );
         }
          return false;
        }
      }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            $resu=$( "<li>" ).append( item.nombre + "</li>" ).appendTo( ul );
            return ($resu); 
      };
  }

function autocompletar_marca(){
      var cache = {};
      $( "#marca" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
                    var term = request.term;
                    if ( term in cache ) {
                      response( cache[ term ] );
                      return;
                    }
             
                    $.getJSON( base_url+"/service/motos/marcas/"+$("#marca").val(), request, function( data, status, xhr ) {
                      cache[ term ] = data.content;
                      response( data.content );
                    })
              },
        select: function( event, ui ) {
          var size = 0, key;
          for (key in ui.item) {
            if (ui.item.hasOwnProperty(key)) size++;
          } 
          if (size>0){
            $("#marca").val( ui.item.nombre );
         }
          return false;
        }
      }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            $resu=$( "<li>" ).append( item.nombre + "</li>" ).appendTo( ul );
            return ($resu); 
      };
  }
