citasJS = {

	btn_viewByEspecialidad:'#cboEspecialidad',
	tbl_citas:'div#containerCitas',
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
	btn_delete: '.eliminar_c',

	init:function(){
		citasJS.viewCitasByEspecialidad()
		citasJS.modal_cita()
	},

	modal_cita: function(){
		$(citasJS.btn_modal).click(function(){
			scriptMain.addLoader()
			$.ajax({
				url: "view_modal_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "GET",
			}).done(function(data){	
				$(citasJS.modal).html(data);
				$(citasJS.modal).modal('show');
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			}).always(function(){
				scriptMain.removeLoader()
			});
		});
	},

	viewCitasByEspecialidad: function(){
		$(citasJS.btn_viewByEspecialidad).change(function(){
			scriptMain.addLoader();
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
			}).always(function(){
				scriptMain.removeLoader();
			});
		});
	},

	modalCitas: function(){
		$(citasJS.cbo_especialidad).change(function(){
			especialidad = $(this).val()
			if (especialidad != 0){
				scriptMain.addLoader();
				$.ajax({
					url: "search_medicos",
					headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
					type: "POST",
					data:{especialidad:especialidad}
				}).done(function(data){	
					$(citasJS.cbo_medico).html(data);
				}).fail(function(){
					swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
				}).always(function(){
					scriptMain.removeLoader();
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
			scriptMain.addLoader();
			form = $(citasJS.input_save).serializeArray();
			$.ajax({
				url: "save_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:form,
				dataType:'json',
			}).done(function(data){	
				if(data.estatus == 200){
					swal({
				            title: "Éxito!", 
				            text: "Se ha registrado con éxito la cita", 
				            type: "success"
					        },function() {
					            location.reload();
					        });
				} else {
					swal("Error!", data.erros, "error");
				}
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo", "error");
			}).always(function(){
				scriptMain.removeLoader();
			});
		});
	},

	edit: function(){
		$(citasJS.btn_edit).unbind('click').click(function(){
			scriptMain.addLoader();
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
			}).always(function(){
				scriptMain.removeLoader();
			});
		});
	},

	todas: function(){
 			$("#citas-tabla").DataTable({
			    "language": {
			      "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
			    },
			   "order": [[ 3, "desc" ]],
                processing: true,
                pagination: true,
                serverSide: true,
                ajax: "getCitas",
                columns: [
                    {data: 'ID', name: 'cita_medica.ID'},
		            {data: 'NOMBRE_PACIENTE', name: 'cita_medica.NOMBRE_PACIENTE'},
		            {data: 'APELLIDO_PACIENTE', name: 'cita_medica.APELLIDO_PACIENTE'},
		            {data: 'FECHA_CITA', orderable: true, render:function(data, type, row){
		            	fecha = data.split("-");
		            	return fecha[2]+"-"+fecha[1]+"-"+fecha[0];
		            }},
		            {data: 'NOMBRE_MEDICO', name: 'medicos.NOMBRE'},
		            {data: 'APELLIDO_MEDICO', name: 'medicos.APELLIDO'},
		            {data: 'ESPECIALIDAD', name: 'especialidad.ESPECIALIDAD'},
		            {data: 'DESCRIPCION', name: 'estatus_cita.DESCRIPCION'},
		            {
	                    "render": function ( data, type, row ) {
	                    	 
	                     	editar = "<button title='Editar' class='btn btn-primary edit_c' cita='"+row["ID"]+"' reg=''><i class='icon-pencil'></i></button>";
	                        eliminar = "<button title='Eliminar' class='btn btn-danger eliminar_c' cita='"+row["ID"]+"' reg=''><i class='icon-trash'></i></button>";
	                        return editar + eliminar
	                    },
	                },
		        ],
		         "fnDrawCallback": function( oSettings ) {
                      citasJS.edit();
                      citasJS.eliminar();
                },
            });
	},

	eliminar: function(){
        $(citasJS.btn_delete).click(function(){
            id = $(this).attr("cita");
            swal({
                title: "Confirmar",
                text: "¿Está seguro que desea elminar esta cita? se elminará de la BD.",
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
                        url: "deleteCita",
                        headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
                        type: "POST",   
                        data:{id:id},
                    }).done(function(data){
                       if(data.estatus){
                            swal({
                              title: "Eliminado!", 
                                text: "Se ha elminado la cita con éxito", 
                                type: "success"
                                },function() {
                                    location.reload();
                             });
                       }else{
                         swal("Error!", "Cita no h eliminada", "error");
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

	actualizar_cita: function(){
		$(citasJS.edit_cita).click(function(){
			scriptMain.addLoader();
			form = $(citasJS.input_save).serializeArray();
			$.ajax({
				url: "edit_cita",
				headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
				type: "POST",
				data:form
			}).done(function(data){
				if(data.estatus == 200){
					swal({
			            title: "Éxito!", 
			            text: "Se ha actualizado la cita con éxito", 
			            type: "success"
				        },function() {
				            location.reload();
				        });
	    			
				} else {
					swal("Error!", data.errors, "error");
				}
			}).fail(function(){
				swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
			}).always(function(){
				scriptMain.removeLoader();
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
			 	scriptMain.addLoader();
			 		$.ajax({
						url: "cancelar_cita",
						headers: {'X-CSRF-TOKEN':$(citasJS.token).val()},
						type: "POST",
						dataType: "json",
						data:{cita:cita}
					}).done(function(data){
						if(data.estatus == 200){
							swal({
			            title: "Cancelada!", 
			            text: "Se ha cancelado la cita con éxito", 
			            type: "success"
				        },function() {
				            location.reload();
				        });
						} else {
							swal("Error!", data.erros, "error");
						}
					}).fail(function(){
						swal("Error!", "Ha ocurrido un error. Inténtelo de nuevo	", "error");
					}).always(function(){
						scriptMain.removeLoader();
					});
			  	} else {
					swal("Cancelado", "Ha cancelado el registro de las especialidad "+name, "error");
			 	}
			});
		});
	},

	datepicker: function(){
			 $.datepicker.regional['es'] = {
	         closeText: 'Cerrar',
	         prevText: '< Ant',
	         nextText: 'Sig >',
	         currentText: 'Hoy',
	         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	         weekHeader: 'Sm',
	         dateFormat: 'dd-mm-yy',
	         firstDay: 1,
	         isRTL: false,
	         showMonthAfterYear: false,
	         yearSuffix: ''
	         };
	         $.datepicker.setDefaults($.datepicker.regional['es']);
	 $('.datepicker').datepicker({
	        minDate:  new Date(),
	    });

	    $( "#fechap" ).datepicker({
	        yearRange: '1950:c',
	        maxDate:  new Date(),
	        changeYear: true
	    });
	},
}

$(function(){
	citasJS.init()
});