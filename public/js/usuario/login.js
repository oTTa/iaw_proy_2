$( document ).ready(function() {
     $(".form-horizontal").find("input,textarea,select").jqBootstrapValidation(
     {
                        preventSubmit: true,
                        submitError: function($form, event, errors) {
                            //se puede usar para hacer logs
                        },
                        submitSuccess: function($form, event) {
                            event.preventDefault();
                            login();

                        },
                        filter: function() {
                        	 //ignora los elementos que no estan visibles en la pagina
                            return $(this).is(":visible");
                        }
    });
});

function login(){
  $("#error_general").hide();
  data = {
    "email": $("#email").val(),
    "password": $("#password").val(),
  }
	var settings = {
  "async": true,
  "crossDomain": true,
  "url": base_url+"/service/usuarios/login",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": JSON.stringify(data)
}

$.ajax(settings).done(function (response) {
    if (response.header.status=="success"){
      window.location.replace(base_url);
    }
    else{
        $("#error_general").text(response.header.message);
        $("#error_general").show();
    }
});
}