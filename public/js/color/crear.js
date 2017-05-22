$( document ).ready(function() {
    
});
var id=null;
function crearcolor(){
    if ($('#imagen')[0].files[0]==null){
      $("#error_general").text('debes seleccionar una imagen');
      $("#error_general").show();
    }
    else{
      id=$("#id_moto").val();
      $("#error_general").hide();
      var formData = new FormData();
      formData.append('imagen', $('#imagen')[0].files[0]);
      formData.append('color', $('#color').val());
      formData.append('id', id);
      $.ajax({
             url : base_url+'/service/motos/color/agregar',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(response) {
                 $("#main_container").empty();
                 $("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'/motos/listar'+'" class="alert-link">Ver motos</a><br/><a href="'+base_url+'/motos/colores/agregar/'+id+'" class="alert-link">Agregar otro color</a></div>');
             }
      });
  }
}