<!-- <!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('menu.iniciar_sesion') }}</h4>
      </div>
      <div class="modal-body">
        <form action="{{URL('login')}}"  method="POST"  id="loginForm">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="login-usuario">{{ trans('palabras.usuario') }}</label>
          <input type="text" class="form-control" id="user"
                name="user"  placeholder="{{ trans('palabras.usuario') }}">
        </div>
        <div class="form-group">
          <label for="password">{{ trans('palabras.contraseña') }}</label>
          <input type="password" class="form-control" id="password" 
                name="password"  placeholder="{{ trans('palabras.contraseña') }}">
        </div>
        <div class="row">
          <div id="loginError" class="col-md-12 error-message" align="center">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" align="center">
            <h5>{{ trans('menu.olvide_contraseña') }} <a href="{{URL('password')}}">{{ trans('palabras.contraseña') }}</a></h5>
          </div>
          <div class="col-md-12" align="center">
             <h5>¿{{ trans('menu.crear_cuenta') }}? <a href="{{URL::route('usuario.create')}}">{{ trans('menu.registrate') }}!</a></h5>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('palabras.cerrar') }} </button>
        <button type="button" id="enviarForm" class="btn btn-primary"> {{ trans('palabras.aceptar') }}</button>
      </div>
    </div>
  </div>
</div> 

<script type="text/javascript">
$(function(){
    user.init();
 })
 </script>