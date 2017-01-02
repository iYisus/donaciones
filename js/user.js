user = {

btn_edit: "button.edit",
divModal: "div#usuariosModal",
token : "input#token",
actualizar : "button#actualizarUsuario",
input_save: '.inputSave',
btn_delete: "button.delete",


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
                ajax: {
                    "headers": {'X-CSRF-TOKEN':$(user.token).val()},
                    "url": "usuariosData",
                    "type": "POST"
                },
                columns: [
                    { data: 'id', name: 'users.id' },
                    { data: 'nombre', name: 'users.nombre' },
                    { data: 'apellido', name: 'users.apellido' },
                    { data: 'user_name', name: 'users.user_name' },
                    { data: 'DESCRIPCION', name: 'roles.DESCRIPCION'},
                    {
                         "render": function ( data, type, row ) {
                            eliminar = "<button title='Eliminar' class='btn btn-danger delete' user='"+row["id"]+"' estatus='2'><i class='icon-remove'></i></button>";
                            editar = "<button title='Editar' class='btn btn-primary edit' user='"+row["id"]+"' reg=''><i class='icon-pencil'></i></button>";
                            return editar+eliminar;
                        },
                    },
                ],
                "fnDrawCallback": function( oSettings ) {
                    user.find_user();  
                    user.delete_user();
                     
                },
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

    find_user: function(){
        $(user.btn_edit).click(function(){
            scriptMain.addLoader();
            id = $(this).attr('user');
            $.ajax({
                url: "buscarUsuario",
                headers: {'X-CSRF-TOKEN':$(user.token).val()},
                type: "POST",   
                data:{id:id}
            }).done(function(data){
                console.log(data);
                $(user.divModal).html(data);
                $(user.divModal).modal('show');
                scriptMain.removeLoader();
            }).fail(function(){
                swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo    ", "error");
            }).always(function(){
                scriptMain.removeLoader();
            });
        });
    },

    editar_user: function(){
        $(user.actualizar).click(function(){
            scriptMain.addLoader();
            params = $(user.input_save).serializeArray();
            $.ajax({
                url: "actualizarUsuario",
                headers: {'X-CSRF-TOKEN':$(user.token).val()},
                type: "POST",   
                data:params
            }).done(function(data){
                if(data.estatus == true){
                    swal({
                      title: "Éxito!", 
                        text: "Se ha modificado usuario con éxito", 
                        type: "success"
                        },function() {
                            location.reload();
                     });
                }else{
                     swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo    ", "error");
                }
            }).fail(function(){
                swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo    ", "error");
            }).always(function(){
                scriptMain.removeLoader();
            });
        });
    },

    delete_user: function(){
        $(user.btn_delete).click(function(){
            id = $(this).attr("user");
            swal({
                title: "Confirmar",
                text: "¿Está seguro que desea elminar este usuario? se elminará de la BD.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "No, cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    scriptMain.addLoader();
                    $.ajax({
                        url: "deleteUser",
                        headers: {'X-CSRF-TOKEN':$(user.token).val()},
                        type: "POST",   
                        data:{id:id},
                    }).done(function(data){
                       if(data.estatus.id){
                            swal({
                              title: "Eliminado!", 
                                text: "Se ha elminado el usuario con éxito", 
                                type: "success"
                                },function() {
                                    location.reload();
                             });
                       }else{
                         swal("Error!", "Usuario no he eliminado", "error");
                       }
                    }).fail(function(){
                        swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo    ", "error");
                    }).always(function(){
                        scriptMain.removeLoader();
                    });
                } else {
                    swal("Cancelado", "Ha cancelado elmiar el usuario", "error");
                }
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