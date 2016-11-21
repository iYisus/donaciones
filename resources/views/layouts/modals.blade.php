<!-- <!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inicio de Sesión</h4>
      </div>
      <div class="modal-body">
        <form action="{{URL('login')}}"  method="POST"  id="loginForm">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="login-usuario">Usuario</label>
          <input type="text" class="form-control" id="user"
                name="user"  placeholder="Usuario">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" 
                name="password"  placeholder="Contraseña">
        </div>
        <div class="row">
          <div id="loginError" class="col-md-12 error-message" align="center">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" align="center">
            <h5>Olvidé mi <a href="">contraseña</a></h5>
          </div>
          <div class="col-md-12" align="center">
             <h5>¿Aún no tienes cuenta? <a href="{{URL::route('usuario.create')}}">Registraste!</a></h5>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="enviarForm" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div> 

<script type="text/javascript">
$(function(){
    user.init();
})
 </script>