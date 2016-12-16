especialidadesJS = {

	btn_save:'#save',
	btn_edit: '.edit',
	btn_estatus : '.estatus',
	input_save: '.inputSave',
	token: '#token',
	name: '#nmEspecialidad',
	tbody: '#tbodyEspecialidades',

	init:function(){
		especialidadesJS.save();
	},

	// Funcion para registrar nueva especialidad
	save:function(){
		$(especialidadesJS.btn_save).click(function(){
			name = $(especialidadesJS.name).val()
			if (name.length == 0){
				swal({
					title: "Nombre de la especialidad!",
					text: "El nombre de la especialidad es obligatorio, por favor introduzca una especialidad válida",
					type: "error",
					showLoaderOnConfirm: true,
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
					showLoaderOnConfirm: true,
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm){
				 	if (isConfirm) {
				 		scriptMain.addLoader();
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
								especialidadesJS.cleanInputEspecialidad()
								$(especialidadesJS.tbody).html(data.data)
							} else {
								swal("Error!", data.erros, "error");
							}
						}).fail(function(){
							swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
						}).always(function(){
							scriptMain.removeLoader();
						});
				  	} else {
				  		scriptMain.removeLoader();
						swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
				 	}
				});
			}
		});
	},

	// Funcion para actualizar especialidades
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
				showLoaderOnConfirm: true,
				inputPlaceholder: name
			}, function(inputValue){
				scriptMain.addLoader();
				if (inputValue === false){
					 scriptMain.removeLoader();
					return false
				}
				if (inputValue === "") {
					scriptMain.removeLoader();
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
		    			especialidadesJS.cleanInputEspecialidad()
		    			$(especialidadesJS.tbody).html(data.data)			
					} else {
						swal("Error!", data.erros, "error");
					}
				}).fail(function(){
					swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
				}).always(function(){
					scriptMain.removeLoader();
				});
			});
		});
	},
	// Funcion para actualizar estatus: especialidad activa/inactiva
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
				showLoaderOnConfirm: true,
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
			 	if (isConfirm) {
			 	scriptMain.addLoader();
			 		$.ajax({
						url: "edit_especialidad",
						headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
						type: "POST",
						dataType: "json",
						data:params
					}).done(function(data){
						if(data.estatus == 200){
			    			swal("Registrado!", "Se ha actualizado el estatus con éxito", "success");
			    			especialidadesJS.cleanInputEspecialidad()
			    			$(especialidadesJS.tbody).html(data.data)			
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
					}).always(function(){
						scriptMain.removeLoader();
					});
			  	} else {
			  		scriptMain.removeLoader();
					swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
			 	}
				});
		});
	},

	cleanInputEspecialidad: function(){
		$(especialidadesJS.name).val('');
	}
}

$(function(){
	especialidadesJS.init()
});