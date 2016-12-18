eventosJS = {

	btn_save:'#save',
	btn_edit: '#edit',
	btn_estatus: '.cambiarEstatus',
	btn_desarchivar: '.desarchivar',
	btn_desactivar: '.desactivar',
	btn_activar: '.activar',
	input_save: '.inputSave',
	token: '#token',
	view: '.viewEvento',
	cancelar: '.cancelar',
	modal: '#eventoModal',
	divEventosEspera: '.divEventosEspera',
	btn_modal: '.modal-registrar',

	init:function(){
		eventosJS.openModal()
	},

	viewEvento: function(){
		$(eventosJS.view).click(function(){
			evento = $(this).attr('evento');
			$.ajax({
				url: "search_evento",
				headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
				type: "POST",
				// dataType: "json",
				data:{evento:evento}
			}).done(function(data){
				$(eventosJS.modal).html(data);
				$(eventosJS.modal).modal('show');
				// if(data.estatus == 200){
	   //  			swal("Registrado!", "Se ha registrado con éxito el evento", "success");
	   //  			location.reload();
				// } else {
				// 	swal("Error!", data.erros, "error");
				// }
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
			});
		});
	},

	openModal: function(){
		$(eventosJS.btn_modal).click(function(){
			$.ajax({
				url: "modal",
				headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
				type: "GET",
			}).done(function(data){
				$(eventosJS.modal).html(data);
				$(eventosJS.modal).modal('show');
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
			});
		});
	},

	archivarEvento: function(){
		$(eventosJS.btn_estatus).click(function(){
			evento = $(this).attr('evento');
			estatus = $(this).attr('estatus');
			if (estatus == 2){
				titulo = "Archivado!"
				pregunta = "¿Está seguro que desea archivar este evento?";
				mensaje = "Se ha archivado el evento con éxito"
			} else {
				titulo = "Cancelado!"
				pregunta = "¿Está seguro que desea cancelar este evento?";
				mensaje = "Se ha cancelado el evento con éxito"
			}
			swal({
				title: "Confirmar",
				text: pregunta,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí",
				cancelButtonText: "No",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			 		$.ajax({
						url: "estatus_evento",
						headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:{evento:evento,estatus:estatus}
					}).done(function(data){
						if(data.estatus == 200){
			    			swal(titulo, mensaje, "success");
			    			location.reload();
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
					});
			  	} else {
					swal("Activo", "El evento continua activo", "error");
			 	}
			});
		});
	},

	desarchivar: function(){
		$(eventosJS.btn_desarchivar).click(function(){
			evento = $(this).attr('evento');
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea desarchivar este evento",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí",
				cancelButtonText: "No",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			    	$.ajax({
						url: "estatus_evento",
						headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:{evento:evento,estatus:1}
					}).done(function(data){
						if(data.estatus == 200){
			    			swal('Activo', "El evento ha sido activado", "success");
			    			location.reload();
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
					});
			  	} else {
					swal("Activo", "El evento continua activo", "error");
			 	}
			});			
		});
	},

	editarEvento: function(){
		$(eventosJS.btn_edit).click(function(){
			params = $(eventosJS.input_save).serializeArray();
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea guardar los cambios?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí",
				cancelButtonText: "No",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			    	$.ajax({
						url: "edit_evento",
						headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
							$(eventosJS.modal).modal('hide');
							eventosJS.cleanInputs()
			    			$(eventosJS.divEventosEspera).html(data.data)
			    			swal("Registrado!", "Se ha actualizado el evento", "success");
						} else {
							swal("Error!", data.errors, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
					});
			  	} else {
					swal("Cancelado", "El evento no ha sido actualizado", "error");
			 	}
			});
		});
	},

	save: function(){
		$(eventosJS.btn_save).click(function(){
			params = $(eventosJS.input_save).serializeArray();
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea registrar el evento?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí, registrar",
				cancelButtonText: "No, cancelar",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			 		$.ajax({
						url: "save_evento",
						headers: {'X-CSRF-TOKEN':$(eventosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
							$(eventosJS.modal).modal('hide');
							eventosJS.cleanInputs()
			    			$(eventosJS.divEventosEspera).html(data.data)
			    			swal("Registrado!", "Se ha registrado con éxito el evento", "success");
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
					});
			  	} else {
					swal("Cancelado", "Ha cancelado el registro del evento", "error");
			 	}
			});
		});
	},

	cleanInputs: function(){
		$(eventosJS.input_save).val('');
	},
}

$(function(){
	eventosJS.init()
});