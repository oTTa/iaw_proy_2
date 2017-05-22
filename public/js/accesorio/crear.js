$( document ).ready(function() {
     $(".form-horizontal").find("input,textarea,select").jqBootstrapValidation(
     {
                        preventSubmit: true,
                        submitError: function($form, event, errors) {
                            //se puede usar para hacer logs
                        },
                        submitSuccess: function($form, event) {
                            event.preventDefault();
                            crear_articulo();

                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
     autocompletar_tipo();
});

function crear_articulo(){
    if ($('#imagen')[0].files[0]==null){
      $("#error_general").text('debes seleccionar una imagen');
      $("#error_general").show();
    }
    else{
      id=$("#id_moto").val();
      $("#error_general").hide();
      var formData = new FormData();
      formData.append('imagen', $('#imagen')[0].files[0]);
      formData.append('nombre', $('#nombre').val());
      formData.append('tipo', $('#tipo').val());
      formData.append('descripcion', $('#descripcion').val());
      formData.append('precio', $('#precio').val());
      $.ajax({
             url : base_url+'/service/accesorios/crear',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(response) {
                console.log(response);
                 $("#main_container").empty();
                 $("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'/accesorios/listar'+'" class="alert-link">Ver accesorios</a><br/><a href="'+base_url+'/accesorios/crear" class="alert-link">Agregar otro accesorio</a></div>');
             }
      });
  }

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
             
                    $.getJSON( base_url+"/service/accesorios/tipos/"+$("#tipo").val(), request, function( data, status, xhr ) {
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