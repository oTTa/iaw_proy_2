$( document ).ready(function() {
     $(".form-horizontal").find("input,textarea,select").jqBootstrapValidation(
     {
                        preventSubmit: true,
                        submitError: function($form, event, errors) {
                            //se puede usar para hacer logs
                        },
                        submitSuccess: function($form, event) {
                            event.preventDefault();
                            crear_usuario();

                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
});

function crear_usuario(){
	if ($('#imagen')[0].files[0]==null){
      $("#error_general").text('debes seleccionar una imagen');
      $("#error_general").show();
    }
    else{
      $("#error_general").hide();
      $("#boton_crear").hide();
      $("#spinner").show();
      var formData = new FormData();
      var fecha_aux =$('#fecha_nacimiento').val();
      var dia = fecha_aux.substring(0,2);
      var mes = fecha_aux.substring(3,5);
      var año = fecha_aux.substring(6,10);
      var fecha_nacimiento =año+'-'+mes+'-'+dia;
      console.log(fecha_nacimiento);
      formData.append('imagen', $('#imagen')[0].files[0]);
      formData.append('nombre', $('#nombre').val());
      formData.append('apellido', $('#apellido').val());
      formData.append('email', $('#email').val());
      formData.append('password', $('#password').val());
      formData.append('fecha_nacimiento', fecha_nacimiento);
      $.ajax({
             url : base_url+'/service/usuarios/registrarse',
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             success : function(response) {
                console.log(response);
                if (response.header.status=="success"){
	                 $("#main_container").empty();
	                 $("#main_container").html('<div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true"></i> '+response.header.message+'<br/><a href="'+base_url+'" class="alert-link">Ir al inicio</a></div>');
	            }
	            else{
	            	$("#error_general").text(response.header.message);
      				  $("#error_general").show();
                $("#boton_crear").show();
                $("#spinner").hide();
	            }

             }
      });
  }
}