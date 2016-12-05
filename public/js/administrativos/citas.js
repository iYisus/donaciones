citasJS = {

	btn_viewproximas:'#cboEspecialidad',
	tbl_citas:'#tblCitas',
	token: '#token',
	input_save: '.inputSave',
	cbo_especialidad: '#especialidad',
	cbo_medico: '#medico',
	btn_save: '#save',
	btn_cancelar: '.cancelar',
	btn_edit: '.edit_c',
	edit_cita: '#edit',
	modal: '#citasModal',
	btn_modal: '.view_modal',

	init:function(){
		citasJS.viewCitasByEspecialidad()
		citasJS.modal_cita()
	},

	modal_cita: function(){
		$(citasJS.btn_modal).click(function(){
			$.ajax({
				url: "view_modal_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "GET",
			}).done(function(data){	
				$(citasJS.modal).html(data);
				$(citasJS.modal).modal('show');
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			});
		});
	},

	viewCitasByEspecialidad: function(){
		$(citasJS.btn_viewproximas).change(function(){
			especialidad = $(this).val();
			$.ajax({
				url: "view_proximas_citas",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:{especialidad:especialidad}
			}).done(function(data){	
				$(citasJS.tbl_citas).html(data);
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			});
		});
	},

	modalMedicos: function(){
		$(citasJS.cbo_especialidad).change(function(){
			especialidad = $(this).val()
			if (especialidad != 0){
				$.ajax({
					url: "search_medicos",
					headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
					type: "POST",
					data:{especialidad:especialidad}
				}).done(function(data){	
					$(citasJS.cbo_medico).html(data);
				}).fail(function(){
					swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
				});
				$(citasJS.cbo_medico).attr('readonly',false)
				$(citasJS.btn_save).attr('disabled',false)
			} else {
				$(citasJS.cbo_medico).attr('readonly',true)
				$(citasJS.cbo_medico).html('<option>SELECCIONE UNA ESPECIALIDAD</option>')
				$(citasJS.btn_save).attr('disabled',true)
			}
		});
	},

	save:function(){
		$(citasJS.btn_save).unbind('click').click(function(){
			form = $(citasJS.input_save).serializeArray();
			$.ajax({
				url: "save_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:form,
				dataType:'json',
			}).done(function(data){	
				if(data.estatus == 200){
	    			swal("Registrado!", "Se ha registrado con éxito la cita", "success");
	    			location.reload();
				} else {
					swal("Error!", data.erros, "error");
				}
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
			});
		});
	},

	edit: function(){
		$(citasJS.btn_edit).unbind('click').click(function(){
			cita = $(this).attr('cita');
			$.ajax({
				url: "search_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:{cita:cita}
			}).done(function(data){
				$(citasJS.modal).html(data);
				$(citasJS.modal).modal('show');
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			});
		});
	},

	actualizar_cita: function(){
		$(citasJS.edit_cita).click(function(){
			form = $(citasJS.input_save).serializeArray();
			$.ajax({
				url: "edit_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:form
			}).done(function(data){
				if(data.estatus == 200){
	    			swal("Actualizada!", "Se ha actualizado la cita con éxito", "success");
	    			location.reload();
				} else {
					swal("Error!", data.errors, "error");
				}
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			});
		});
	},

	cancelarCita: function(){
		$(citasJS.btn_cancelar).unbind('click').click(function(){
			cita = $(this).attr('cita');
			swal({
				title: "Cancelar",
				text: "¿Está seguro que desea cancelar la cita?",
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
						url: "cancelar_cita",
						headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
						type: "POST",
						dataType: "json",
						data:{cita:cita}
					}).done(function(data){
						if(data.estatus == 200){
			    			swal("Cancelada!", "Se ha cancelado la cita con éxito", "success");
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

}

$(function(){
	citasJS.init()
});