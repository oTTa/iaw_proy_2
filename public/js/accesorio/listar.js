$(document).ready(function() {
    init_table();
});

function init_table(){
	$('#tbl_accesorios').DataTable( {
		ajax: {
			url: base_url+'/service/accesorios/listar',
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
	        	data: 'tipo' 
	        },
	        { 
	        	data: 'descripcion' 
	        },
	        { 
	        	data: 'precio' ,
	        	render: function ( data, type, full, meta ) {
	        		return ("$"+data);
	        	}
	        },
	        { 
	        	render: function ( data, type, full, meta ) {
	        		var año = full.created_at.substring(0, 4);
	        		var mes = full.created_at.substring(5, 7);
	        		var dia = full.created_at.substring(8, 10);

	        		var horario = full.created_at.substring(11, 16);

	        		var creacion= "<p>"+dia+"/"+mes+"/"+año+" "+horario+"</p>"

	        		año = full.updated_at.substring(0, 4);
	        		mes = full.updated_at.substring(5, 7);
	        		dia = full.updated_at.substring(8, 10);

	        		horario = full.updated_at.substring(11, 16);

	        		var modificacion= "<p>"+dia+"/"+mes+"/"+año+" "+horario+"</p>"

	        		return (creacion+modificacion);
    			} 
	        },
	        { 
	        	data: 'url_thumbnail',
	        	render: function ( data, type, full, meta ) {
	        		return ('<img src="'+base_url+data+'" style="max-width: 100px;" class="img-responsive">');
    			},
    			sortable: false
	        },
	        { 
	        	data: 'id',
	        	render: function ( data, type, full, meta ) {
    				  return ('<a href="'+base_url+'/accesorios/editar/'+data+'" style="float:right;"><i class="fa fa-pencil"  aria-hidden="true"></i> Editar</a>');
    			},
    			sortable: false
	        },
    	]
    });
}