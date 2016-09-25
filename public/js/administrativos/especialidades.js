especialidadesJS = {

	btn_save:'#save',
	btn_edit: '.edit',
	input_save: '.inputSave',
	token: '#token',
	name: '#nmEspecialidad',

	init:function(){
		especialidadesJS.save();
		especialidadesJS.edit();
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
				    	swal("Registrado!", "Se ha registrado con éxito la especialidad "+name, "success");
				  	} else {
						swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
				 	}
				});
			}
			// params = $(especialidadesJS.input_save).serializeArray();
			// $.ajax({
			// 	url: "save_especialidad",
			// 	headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
			// 	type: "POST",
			// 	dataType: "json",
			// 	data:params
			// }).done(function(data){
			// 	console.log(data);
			// }).fail(function(){
				
			// });
		});
	},

	edit: function(){
		$(especialidadesJS.btn_edit).click(function(){
			name = $(this).attr('nombre')
			swal({
				title: "Editar "+name,
				text: "Ingrese actualización	",
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

				swal("Especialidad actualizada!", "Se ha actualizado la especialidad a: "+inputValue, "success");
			});
		});
	}

}

$(function(){
	especialidadesJS.init()
});