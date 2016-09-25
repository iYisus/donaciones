medicosJS = {

	btn_save:'#save',
	btn_edit: '.edit',
	btn_desactivar: '.desactivar',
	btn_activar: '.activar',
	input_save: '.inputSave',
	token: '#token',

	init:function(){
		medicosJS.save();
		medicosJS.edit();
		medicosJS.desactivar();
		medicosJS.activar();
	},

	save:function(){
		// $(medicosJS.btn_save).click(function(){
		// 	name = $(medicosJS.name).val()
		// 	if (name.length == 0){
		// 		swal({
		// 			title: "Nombre de la especialidad!",
		// 			text: "El nombre de la especialidad es obligatorio, por favor introduzca una especialidad válida",
		// 			type: "error",
		// 			confirmButtonText: "Cerrar"
		// 		});
		// 	} else {
		// 		swal({
		// 			title: "Confirmar",
		// 			text: "¿Está seguro que desea registrar la especialidad "+name+" ?",
		// 			type: "warning",
		// 			showCancelButton: true,
		// 			confirmButtonColor: "#DD6B55",
		// 			confirmButtonText: "Sí, registrar",
		// 			cancelButtonText: "No, cancelar",
		// 			closeOnConfirm: false,
		// 			closeOnCancel: false
		// 		},
		// 		function(isConfirm){
		// 		 	if (isConfirm) {
		// 		    	swal("Registrado!", "Se ha registrado con éxito la especialidad "+name, "success");
		// 		  	} else {
		// 				swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
		// 		 	}
		// 		});
		// 	}
		// });
	},

	edit: function(){
		$(medicosJS.btn_edit).click(function(){
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
	},

	desactivar: function(){
		$(medicosJS.btn_desactivar).click(function(){
			swal({
				title: "Confirmar",
				text: "¿Está seguro que desea desactivar estr médico",
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

}

$(function(){
	medicosJS.init()
});