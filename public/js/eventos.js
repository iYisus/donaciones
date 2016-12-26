eventos = {
btn_evento : "a#eventoCard",
divModal : "#modalEventos",
token : "input#token",

	buscarEvento: function(){
        $(eventos.btn_evento).click(function(){
            scriptMain.addLoader();
            id = $(this).attr('evento');
            $.ajax({
                url: "buscarEvento",
                headers: {'X-CSRF-TOKEN':$(eventos.token).val()},
                type: "POST",   
                data:{id:id}
            }).done(function(data){
                console.log(data);
                $(eventos.divModal).html(data.data);
                $(eventos.divModal).modal('show');
                scriptMain.removeLoader();
            }).fail(function(){
            	toastr.error("Ha ocurrido un error!");
            }).always(function(){
                scriptMain.removeLoader();
            });
        });
    },

}