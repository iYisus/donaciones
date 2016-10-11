user = {
    baseUrl : window.location,

    init:function(){
        this.loginForm();
        this.registerForm();
    },

	/*login: function(){
        $("button#login").on('click',function(){
            token = token = $('input[name=_token]').val();
            email = $("#email").val();
            password = $("#password").val();
    		$.ajax({
                    type: "POST",
                    url: "login",
                    headers: {'X-CSRF-TOKEN': token},
                    data: {email:email, password:password}
                }).done(function(data) {
                    console.log(data);
                }).fail(function() {
                  
                }).always(function() {
                    
                });
        })
	},*/

    loginForm: function(){
         $("#enviarForm").on("click",function(event){
         $("#loginForm").submit();
        })

    },  

    registerForm: function(){
         $("#registerForm").on("click",function(event){
         $("#registrarUsuario").submit();
        })

    }
}