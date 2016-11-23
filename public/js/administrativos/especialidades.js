especialidadesJS = {

	btn_save:'#save',
	btn_edit: '.edit',
	btn_estatus : '.estatus',
	input_save: '.inputSave',
	token: '#token',
	name: '#nmEspecialidad',

	init:function(){
		especialidadesJS.save();
		especialidadesJS.edit();
		especialidadesJS.estatus();
	},

	save:function(){
		$(especialidadesJS.btn_save).click(function(){
			name = $(especialidadesJS.name).val()
			if (name.length == 0){
				swal({
					title: "Nombre de la especialidad!",
					text: "El nombre de la especialidad es obligatorio, por favor introduzca una especialidad válida",
					type: "error",
					confirmButtonText: "Cerrar"
				});
			} else {
				swal({
					title: "Confirmar",
					text: "¿Está seguro que desea registrar la especialidad "+name+" ?",
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
				 		params = $(especialidadesJS.input_save).serializeArray();
				 		$.ajax({
							url: "save_especialidad",
							headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
							type: "POST",
							dataType: "json",
							data:params
						}).done(function(data){
							if(data.estatus == 200){
				    			swal("Registrado!", "Se ha registrado con éxito la especialidad "+name, "success");
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
			}
		});
	},

	edit: function(){
		$(especialidadesJS.btn_edit).click(function(){
			params = {}
			params.id = $(this).attr('reg');
			name = $(this).attr('nombre')
			swal({
				title: "Editar "+name,
				text: "Ingrese actualización",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: name
			}, function(inputValue){
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("Ingrese el nombre de la especialidad");
					return false
				}
				params.name = inputValue
				$.ajax({
					url: "edit_especialidad",
					headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
					type: "POST",
					dataType: "json",
					data:params
				}).done(function(data){
					if(data.estatus == 200){
		    			swal("Especialidad actualizada!", "Se ha actualizado la especialidad a: "+inputValue, "success");
		    			location.reload();
					} else {
						swal("Error!", data.erros, "error");
					}
				}).fail(function(){
					swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
				});
			});
		});
	},

	estatus: function(){
		$(especialidadesJS.btn_estatus).click(function(){
			params = {}
			params.id = $(this).attr('reg');
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
						url: "edit_especialidad",
						headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
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

}

$(function(){
	especialidadesJS.init()
});