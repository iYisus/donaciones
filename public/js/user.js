user = {

    init: function() {
        //this.loginForm();
        this.registerForm();
        this.login();
    },

    login: function() {
        $("button#enviarForm").on('click', function() {
            scriptMain.addLoader();
            $("div#loginError").html("")
            token = $('input[name=_token]').val();
            user = $("#user").val();
            password = $("#password").val();
            $.ajax({
                type: "POST",
                url: "login",
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    user: user,
                    password: password
                }
            }).done(function(data) {
                console.log(data);
                if (data.estatus != 200) {
                    toastr.error(data.error);
                } else {
                    window.location.href = scriptMain.baseUrl + "/"
                }
            }).fail(function(data) {
                if (data.status === 422) {
                    $("div#loginError").html("Campos Usuario/Contraseña no pueden estar vaciós")
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

    }
}