user = {

    init: function() {
        this.registerForm();
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
    users: function(){
      $(function() {
            $('#users-table').DataTable({
                processing: true,
                "scrollY": "400px",
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                },
                serverSide: true,
                ajax: "usuariosData",

                columns: [
                    { data: 'id', name: 'users.id' },
                    { data: 'nombre', name: 'users.nombre' },
                    { data: 'apellido', name: 'users.apellido' },
                    { data: 'user_name', name: 'users.user_name' },
                    { data: 'DESCRIPCION', name: 'roles.DESCRIPCION'},
                    {
                         "render": function ( data, type, row ) {
                            estatus = "<button title='Desactivar' class='btn btn-danger estatus' medico='"+row["ID"]+"' estatus='2'><i class='icon-remove'></i></button>";
                            editar = "<button title='Editar' class='btn btn-primary edit' medico='"+row["ID"]+"' reg=''><i class='icon-pencil'></i></button>";
                            return editar+estatus;
                        },
                    },
                ],
                 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                        if (aData.FK_ESTATUS_USUARIO_ID == 2){
                            $(nRow).children('td').eq(0).addClass('border-red');
                        }
                        if (aData.FK_ESTATUS_USUARIO_ID == 1){
                            $(nRow).children('td').eq(0).addClass('border-green');
                        }
                },
            });
        });  
    },


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