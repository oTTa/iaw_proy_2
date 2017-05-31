$(document).ready(function() {
    init_table();
});
var tabla=null;
function init_table(){
	tabla=$('#tbl_usuarios').DataTable( {
		ajax: {
			url: base_url+'/service/usuarios/listar',
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
	        	data: 'url_foto_perfil',
	        	render: function ( data, type, full, meta ) {
	        		return ('<img src="'+base_url+data+'" style="max-width: 100px;" class="img-responsive">');
    			},
    			sortable: false 
	        },
	        { 
	        	data: 'nombre' 
	        },
	        { 
	        	data: 'apellido' 
	        },
	        { 
	        	data: 'email' 
	        },
	        { 
	        	render: function ( data, type, full, meta ) {
	        		var año = full.fecha_nacimiento.substring(0, 4);
	        		var mes = full.fecha_nacimiento.substring(5, 7);
	        		var dia = full.fecha_nacimiento.substring(8, 10);

	        		var fecha_nacimiento = "<p>"+dia+"/"+mes+"/"+año+"</p>"

	        		return (fecha_nacimiento);
    			} 
	        },
	        { 
	        	render: function ( data, type, full, meta ) {
	        		var año = full.created_at.substring(0, 4);
	        		var mes = full.created_at.substring(5, 7);
	        		var dia = full.created_at.substring(8, 10);

	        		var horario = full.created_at.substring(11, 16);

	        		var registro = "<p>"+dia+"/"+mes+"/"+año+" "+horario+"</p>"

	        		return (registro);
    			}
	        },
	        { 
	        	data: 'id',
	        	render: function ( data, type, full, meta ) {
	        		var html = '<a href="'+base_url+'/compras/usuarios/'+data+'" style="float:right;"><i class="fa fa-shopping-cart"  aria-hidden="true"></i> Compras</a><br/>';
    				return (html);
    			},
    			sortable: false
	        },
    	]
    });
}
