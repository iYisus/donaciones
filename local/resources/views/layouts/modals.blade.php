<!--  Modal Log in-->
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
<!--############### Modal Donar ############-->
<div class="modal fade" id="donar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h6 class="modal-title" id=""><i class="icon-heart"></i> {{ trans('palabras.donar') }}!</h6>
      </div>
      <div class="modal-body col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <span class="donacion-text">
              {{ trans('texto.donar_titulo') }}...
            </span>
          </div>
        </div>
        <br>  
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default col-md-12 col-sm-12 col-xs-12">
              <div class="panel-heading col-md-12 col-sm-12 col-xs-12">{{ trans('texto.cuentas_bancarias') }}</div>
              <div class="panel-body col-md-12 col-sm-12 col-xs-12">
                <ul class="donacion-text">
                  <li><b>{{ trans('texto.banco') }}:</b> Banco Central de Venezuela</li>
                  <li><b>{{ trans('palabras.nombre') }}:</b> Instituto de Previsión del Niño</li>
                  <li><b>{{ trans('texto.nro_cuenta') }}:</b> 2224-5555-6666-222</li>
                  <hr>
                  <li><b>{{ trans('texto.banco') }}:</b> Banesco Banco Universal</li>
                  <li><b>{{ trans('palabras.nombre') }}:</b> Instituto de Previsión del Niño</li>
                  <li><b>{{ trans('texto.nro_cuenta') }}:</b> 4444-2323-1231-4331</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal"  class="btn btn-primary"> {{ trans('palabras.aceptar') }} </button>
      </div>
    </div>
  </div>
</div> 
<input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
</div> 
<script type="text/javascript">
$(function(){
    user.login();
 })
 </script>