user = {

    init: function() {
        //this.loginForm();
        this.registerForm();
        this.login();
    },

    login: function() {
        $("button#enviarForm").on('click', function(e) {
            scriptMain.addLoader();
            $("div#loginError").html("")
            token = $('input[name=_token]').val();
            user_name = $("#user").val();
            password = $("#password").val();
            $.ajax({
                type: "POST",
                url: baseUrl+"/login",
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    user_name: user_name,
                    password: password
                }
            }).done(function(data) {
                if (data.estatus != 200) {
                    toastr.error(data.error);
                } else {
                    window.location.href = baseUrl+"/";

                }
            }).fail(function(data) {
                if (data.status === 422) {
                    var mensajes = "";
                    errors = data.responseJSON;
                    $.each( errors , function( key, value ) {
                         mensajes += value[0]+" <br>";
                    });
                    $("div#loginError").html(mensajes)
                } else {
                    toastr.error('Falló la conexión!');
                }
            }).always(function() {
                scriptMain.removeLoader();
            });
        })
    },

    /* loginForm: function(){
          $("#enviarForm").on("click",function(event){
          $("#loginForm").submit();
         })

     },  */

    registerForm: function() {
        $("#registerForm").on("click", function(event) {
            $("#registrarUsuario").submit();
        })

    },

    recoveryPassword: function(){
        $("a#recoveryPassword").on('click', function(){
            $("#recoveryForm").submit();
        })
    },

    modificarPerfil: function(){
        $("a#sendInfo").on('click', function(){
            $("#formInfo").submit();
        })
    },

    modificarPassword: function(){
        $("a#sendPassword").on('click', function(){
            $("#formPassword").submit();
        })
    },

    modificarEmail: function(){
        $("a#sendEmail").on('click', function(){
            $("#formEmail").submit();
        })
    }

}