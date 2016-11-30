@extends('layouts.master')
@section('content')
<div class="container container-padding" style="min-height:600px !important;">
   <div class="row">
      <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
         <div class="panel panel-primary	">
            <div class="panel-heading">
               <h3 class="panel-title "><i class="icon-users"></i> {{ trans('texto.actualizar_perfil') }} <i class="icon-arrow-left  pull-right" onclick="history.go(-1);" style="cursor:pointer;"></i>	</h3>
            </div>
            <div class="panel-body">
              @include('showErrors')
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#Nombre" aria-controls="Nombre" role="tab" data-toggle="tab"> {{ trans('palabras.nombre') }}</a></li>
                  <li role="presentation"><a href="#contraseña" aria-controls="contraseña" role="tab" data-toggle="tab">{{ trans('palabras.password') }}</a></li>
                  <li role="presentation"><a href="#correo" aria-controls="correo" role="tab" data-toggle="tab">{{ trans('palabras.email') }}</a></li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="Nombre">
                     <br>
                     <form action="{{URL('/modificarInfo')}}" method="post" id="formInfo">
                     {{ csrf_field() }}
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="nombre"> {{ trans('palabras.nombre') }}</label>
                           <input type="hidden" name="info" value="true">
                           <input type="text" class="form-control" required name="nombre" id="Nombre"
                              placeholder="">
                        </div>
                     </div>
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="apellido">{{ trans('palabras.apellido') }}</label>
                           <input type="text" class="form-control" name="apellido" id="Apellido"
                              placeholder="">
                        </div>
                     </div>
                    </form>	
                     <div class="col-md-12" align="right">
                        <a href="#" id="sendInfo" class="btn btn-primary id with-arrow">{{ trans('palabras.modificar_info') }} <i class="icon-arrow-right"></i></a>
                     </div>
                  </div>
                  <!-- MODIFICAR CONTRASEÑA -->
                  <div role="tabpanel" class="tab-pane" id="contraseña">
                  <br>
                  	<form action="{{URL('/modificarPassword')}}" method="post" id="formPassword">
                    {{ csrf_field() }}
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="nombre">{{ trans('palabras.password') }}</label>
                           <input type="hidden" name="pass" value="true">
                           <input type="password" class="form-control" name="password" id="password"
                              placeholder="">
                        </div>
                     </div>
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="apellido">{{ trans('palabras.password_nueva') }}</label>
                           <input type="password" class="form-control" name="password_nueva" id="password_nueva"
                              placeholder="">
                        </div>
                     </div>
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="apellido">{{ trans('palabras.password_confirmar') }}</label>
                           <input type="password" class="form-control" name="password_conf" id="password_conf"
                              placeholder="">
                        </div>
                     </div>
                    </form>
                     <div class="col-md-12" align="right">
                        <a href="#" id="sendPassword" class="btn btn-primary id with-arrow">{{ trans('palabras.modificar_password') }} <i class="icon-arrow-right"></i></a>
                     </div>
                  </div>
                  <!-- MODIFICAR CORREO -->
                  <div role="tabpanel" class="tab-pane" id="correo">
                  <br>
                  	<form action="{{URL('/modificarEmail')}}" method="post" id="formEmail">
                    {{ csrf_field() }}
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                        <input type="hidden" name="correo" value="true">
                           <label for="nombre">{{ trans('palabras.correo_actual') }}</label>
                           <input type="text" class="form-control"  name="correo_actual" id="correo_actual"
                              placeholder="">
                        </div>
                     </div>
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="apellido">{{ trans('palabras.correo_nuevo') }}</label>
                           <input type="text" class="form-control" name="email" id="email"
                              placeholder="">
                        </div>
                     </div>
                     <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                           <label for="apellido">{{ trans('palabras.correo_confirmar') }}</label>
                           <input type="text" class="form-control" name="confirmar_email" id="confirmar_email"
                              placeholder="">
                        </div>
                     </div>
                    </form>
                     <div class="col-md-12" align="right">
                        <a href="#" id="sendEmail" class="btn btn-primary id with-arrow">{{ trans('palabras.modificar_correo') }}<i class="icon-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
	$(function(){
		user.modificarEmail();
		user.modificarPassword();
		user.modificarPerfil();
	})
</script>
@endsection