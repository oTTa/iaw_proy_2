$(document).ready(function() {
    init_table();
    init_table_vendedores_agregar();
});
tabla=null;
tabla_vendedores_agregar=null;
function init_table(){
	tabla=$('#tbl_vendedores').DataTable( {
		ajax: {
			url: base_url+'/service/motos/'+$("#id_moto").val(),
			dataSrc: function(json){
				return json.content.vendedores;
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
	        	data: 'nombre' 
	        },
	        { 
	        	data: 'direccion' 
	        },
	        { 
	        	data: 'telefono' 
	        },
	        { 
	        	data: 'id',
	        	render: function ( data, type, full, meta ) {
          		    html = '<div onclick="preparar_borrar('+data+')" style="cursor:pointer; color:red; float:right;" data-toggle="modal" data-target="#modal_borrar" ><i class="fa fa-times" aria-hidden="true"></i> Quitar</div></br>';

    				return (html);
    			}
	        },
    	]
    });
}

function init_table_vendedores_agregar(){
	tabla_vendedores_agregar=$('#tbl_vendedores_agregar').DataTable( {
		ajax: {
			url: base_url+'/service/vendedores/listar',
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
	        	data: 'nombre' 
	        },
	        { 
	        	data: 'direccion' 
	        },
	        { 
	        	data: 'telefono' 
	        },
	        { 
	        	data: 'id',
	        	render: function ( data, type, full, meta ) {
          		    html = '<div onclick="preparar_agregar('+data+')" style="cursor:pointer; color:green; float:right;" data-toggle="modal" data-target="#modal_agregar" ><i class="fa fa-plus" aria-hidden="true"></i></i> Agregar</div></br>';
    				return (html);
    			}
	        },
    	]
    });
}

id_vendedor=null;

function preparar_borrar(id){
 id_vendedor=id;
}

id_vendedor_agregar=null;

function preparar_agregar(id){
 id_vendedor_agregar=id;
}

function eliminar_vendedor(){
	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/motos/"+$(id_moto).val()+'/vendedores/'+id_vendedor+'/eliminar',
		"method": "GET",
	}

	$.ajax(settings).done(function (response) {
		tabla.ajax.reload();
	});
}

function agregar_vendedor(){
	var settings = {
		"async": true,
		"crossDomain": true,
		"url": base_url+"/service/motos/"+$(id_moto).val()+'/vendedores/'+id_vendedor_agregar+'/insertar',
		"method": "GET",
	}

	$.ajax(settings).done(function (response) {
		tabla.ajax.reload();
	});
}