especialidadesJS = {

	btn_save:'#save',
	input_save: '.inputSave',
	token: '#token',

	init:function(){
		especialidadesJS.save();
	},

	save:function(){
		$(especialidadesJS.btn_save).click(function(){
			params = $(especialidadesJS.input_save).serializeArray();
			$.ajax({
				url: "save_especialidad",
				headers: {'X-CSRF-TOKEN':$(especialidadesJS.token).val()},
				type: "POST",
				dataType: "json",
				data:params
			}).done(function(data){
				console.log(data);
			}).fail(function(){
				
			});
		});
	},

}

$(function(){
	especialidadesJS.init()
});