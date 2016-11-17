scriptMain = {
	
baseUrl : window.location,

	init: function(){
		this.toastOptions();
	},
	toastOptions:function (){
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	},


	addLoader: function(){
		$("div.fondo-opaco").show();
		$("div.spinner-wrapp").show();
	},

	removeLoader: function(){
		$("div.fondo-opaco").hide();
		$("div.spinner-wrapp").hide();
	}
}