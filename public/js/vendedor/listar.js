$(document).ready(function() {
    init_table();
});

function init_table(){
	$('#tbl_vendedores').DataTable( {
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
	        	data: 'updated_at',
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
    				  return ('<a href="'+base_url+'/vendedores/editar/'+data+'" style="float:right;"><i class="fa fa-pencil"  aria-hidden="true"></i> Editar</a>');
    			}
	        },
    	]
    });
}