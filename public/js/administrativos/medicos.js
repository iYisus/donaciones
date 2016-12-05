medicosJS = {

	btn_save:'.save',
	btn_edit: '.edit',
	btn_registar: '.btn-registrar-esp',
	btn_desactivar: '.desactivar',
	btn_activar: '.activar',
	btn_estatus : '.estatus',
	btn_save_edit: '.save_edit',
	input_save: '.inputSave',
	token: '#token',
	divModal: '#medicosModal',	
	selectEspecialidad: '#especialidad',

	init:function(){
		medicosJS.save();
		medicosJS.edit();
		medicosJS.desactivar();
		medicosJS.activar();
		medicosJS.estatus();
		medicosJS.modal_registar();
	},

	save:function(){
		$(medicosJS.btn_save).click(function(){
			params = $(medicosJS.input_save).serializeArray();
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea registrar el médico?",
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
						url: "save_medicos",
						headers: {'X-CSRF-TOKEN':$(medicosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
							medicosJS.cleanInputs()
			    			swal("Registrado!", "Se ha registrado con éxito el médico", "success");
			    			location.reload();
						} else {
							swal("Error!", data.errors, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
					});
			  	} else {
					swal("Cancelado", "Ha cancelado el registro del médico", "error");
			 	}
			});
		});
	},

	edit: function(){
		$(medicosJS.btn_edit).click(function(){
			medico = $(this).attr('medico');
			$.ajax({
				url: "search_medico",
				headers: {'X-CSRF-TOKEN':$(medicosJS.token).val()},
				type: "POST",	
				data:{medico:medico}
			}).done(function(data){
				medicosJS.cleanInputs()
				$(medicosJS.divModal).html(data);
				$(medicosJS.divModal).modal('show');
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			});
		});
	},

	save_edit:function(){
		$(medicosJS.btn_save_edit).click(function(){
			params = $(medicosJS.input_save).serializeArray();
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea guardar los cambios?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí, actualizar",
				cancelButtonText: "No, cancelar",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			 		$.ajax({
						url: "edit_medicos",
						headers: {'X-CSRF-TOKEN':$(medicosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
							medicosJS.cleanInputs()
			    			swal("Éxito!", "Se ha actualizado el registro con Éxito", "success");
			    			location.reload();
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
					});
			  	} else {
					swal("Cancelado", "No se guardarán los cambios", "error");
			 	}
			});
		});
	},

	desactivar: function(){
		$(medicosJS.btn_desactivar).click(function(){
			alert('aqui');
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea desactivar este médico?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí, desactivar",
				cancelButtonText: "No, cancelar",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			    	swal("Desactivado!", "Se ha desactivado el médico con éxito", "success");
			  	} else {
					swal("Cancelado", "Ha cancelado desactivar el médico", "error");
			 	}
			});
		});
	},

	activar: function(){
		$(medicosJS.btn_activar).click(function(){
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea activar este médico?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Sí, activar",
				cancelButtonText: "No, cancelar",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			    	swal("Activo!", "Se ha activado el médico con éxito", "success");
			  	} else {
					swal("Cancelado", "Ha cancelado activado el médico", "error");
			 	}
			});
		});
	},

	estatus: function(){
		$(medicosJS.btn_estatus).click(function(){
			params = {}
			params.id = $(this).attr('medico');
			params.estatus = $(this).attr('estatus');
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea cambiar el estatus?",
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
						url: "edit_medicos",
						headers: {'X-CSRF-TOKEN':$(medicosJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
							medicosJS.cleanInputs()
			    			swal("Registrado!", "Se ha actualizado el estatus con éxito", "success");
			    			location.reload();
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
					});
			  	} else {
					swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
			 	}
				});
		});
	},

	modal_registar: function(){
		$(medicosJS.btn_registar).click(function(){
			medicosJS.cleanInputs()
			$(medicosJS.divModal).modal('show');
			$(medicosJS.selectEspecialidad).val($(this).attr('esp'));
		});
	},

	cleanInputs: function(){
		$(medicosJS.input_save).val('');
	},

}

$(function(){
	medicosJS.init()
});