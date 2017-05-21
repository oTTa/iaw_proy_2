$(document).ready(function() {
    init_table();
});
var tabla=null;

function init_table(){ 
	tabla = $('#tbl_vendedores').DataTable( {
		ajax: {
			url: base_url+'/service/motos/listar',
			dataSrc: function(json){
				return json.content;
			}
		},
		processing: true,
        language: {
        	sProcessing:     "Procesando...",
        	sLengthMenu:     "Mostrar _MENU_ registros",
        	sZeroRecords:    "No se encontraron resultados",
        	sEmptyTable:     "Ningún dato disponible en esta tabla",
        	sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        	sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        	sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
        	sInfoPostFix:    "",
        	sSearch:         "Buscar:",
        	sUrl:            "",
        	sInfoThousands:  ",",
        	sLoadingRecords: "Cargando...",
        	oPaginate: {
        		sFirst:    "Primero",
        		sLast:     "Último",
        		sNext:     "Siguiente",
        		sPrevious: "Anterior"
        	},
        	oAria: {
        		sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
        		sSortDescending: ": Activar para ordenar la columna de manera descendente"
        	}
        },
        columns: [
	        { 
	        	data: 'tipo' 
	        },
	        { 
	        	data: 'marca' 
	        },
	        { 
	        	data: 'cilindraje' 
	        },
	        { 
	        	data: 'modelo' 
	        },
	        { 
	        	data: 'precio' 
	        },
	        { 
	        	data: 'url_video' ,
	        	render: function ( data, type, full, meta ) {
	        			return ("<a target='_blank' href='"+data+"'>Ver video <i class='fa fa-youtube-play' aria-hidden='true'></i></a>");
	        	}
	        },
	        { 
	        	data: 'rating' ,
	        	render: function ( data, type, full, meta ) {
	        			html="";
	        			for (var i = 0; i < data; i++) {
	        				html+='<i class="fa fa-star" aria-hidden="true"></i>';
	        			}
	        			return (html);
	        	}
	        },
	        { 
	        	data: 'visible' ,
	        	render: function ( data, type, full, meta ) {
	        		if (data==1)
	        			return ('<i class="fa fa-eye" style="font-size:26px" aria-hidden="true"></i>');
	        		else
	        			return('<i class="fa fa-eye-slash" style="font-size:26px" aria-hidden="true"></i>');
	        	}
	        },
	        { 
	        	data: 'created_at',
	        	render: function ( data, type, full, meta ) {
	        		var año = data.substring(0, 4);
	        		var mes = data.substring(5, 7);
	        		var dia = data.substring(8, 10);

	        		var horario = data.substring(11, 16);

	        		return (dia+"/"+mes+"/"+año+" "+horario);
    			} 
	        },
	        { 
	        	data: 'id',
	        	render: function ( data, type, full, meta ) {
	        		  html ='<a href="'+base_url+'/motos/editar/'+data+'" style="float:right;"><i class="fa fa-pencil"  aria-hidden="true"></i> Editar</a><br/>';
	        		  html += '<a href="'+base_url+'/motos/colores/agregar/'+data+'" style="float:right;"><i class="fa fa-picture-o"  aria-hidden="true"></i> Agregar color</a><br/>';
	        		  html += '<div onclick="preparar_borrar('+data+')" style="cursor:pointer; color:red; float:right;" data-toggle="modal" data-target="#modal_borrar" ><i class="fa fa-times" aria-hidden="true"></i> Borrar</div></br>';
  	        		  html += '<div onclick="preparar_visibilidad('+data+')" data-toggle="modal" data-target="#modal_visibilidad" style="cursor:pointer; color:green; float:right;"><i class="fa fa-eye" aria-hidden="true"></i> Cambiar visibilidad</div></br>';

    				  return (html);
    			}
	        },
    	]
    });
}

id_moto=null;

function preparar_borrar(id){
 id_moto=id;
}

function preparar_visibilidad(id){
 id_moto=id;
}

function eliminar_moto(){
	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/motos/eliminar/"+id_moto,
		"method": "GET",
	}

	$.ajax(settings).done(function (response) {
		tabla.ajax.reload();
	});
}

function cambiar_visibilidad(id){
	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/motos/visibilidad/"+id_moto,
		"method": "GET"
	}

	$.ajax(settings).done(function (response) {
		tabla.ajax.reload();
	});
}