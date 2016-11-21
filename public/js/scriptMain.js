scriptMain = {
	
baseUrl : window.location,

	init: function(){
		this.toastOptions();
		this.sendMail();
	},
	toastOptions:function (){
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	},


	addLoader: function(){
		$("div.fondo-opaco").show();
		$("div.spinner-wrapp").show();
	},

	removeLoader: function(){
		$("div.fondo-opaco").hide();
		$("div.spinner-wrapp").hide();
	},

	sendMail: function (){
		$("button#enviarMail").on('click', function() {
			$("div.email-error").removeClass("alert alert-danger").html("");
            scriptMain.addLoader();
            token = $('input[name=_token]').val();
            nombre = $("#nombre_email").val();
            email = $("#email_send").val();
            mensaje = $("#mensaje_email").val();
            $.ajax({
                type: "POST",
                url: "sendMail",
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    nombre: nombre,
                    email: email,
                    mensaje: mensaje
                }
            }).done(function(data) {
                if(data.estatus == 200) {
                	toastr.success("Correo enviado éxitosamente!")
                }else{
                	toastr.error("Falló al enviar correo!")
                }
            }).fail(function(data) {
            	var mensajes = "";
            	if (data.status === 422) {
            		errors = data.responseJSON;
            		$.each( errors , function( key, value ) {
          					mensajes += value[0]+" <br>";
        			});
                    $("div.email-error").addClass("alert alert-danger").html(mensajes);
                } else {
                    toastr.error("Falló al enviar correo!")
                }
            }).always(function() {
                scriptMain.removeLoader();
            });
        })
	}
}