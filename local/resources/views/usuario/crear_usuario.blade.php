@extends('layouts.master')
@section('content')
<div class="container container-padding">
	<div class="row">
		<div class="col-md-10 col-md-offset-1	">
		<div class="panel panel-primary	">
			<div class="panel-heading">
					<h3 class="panel-title "><i class="icon-users"></i> {{ trans('texto.registrar_usuario') }} <i class="icon-arrow-left  pull-right" onclick="history.go(-1);" style="cursor:pointer;"></i>	</h3>
			</div>
			<div class="panel-body">
			@include('showErrors')
			<form action="{{URL::route('usuario.store')}}" method="POST" id="registrarUsuario">
			{{ csrf_field() }}
			<div class="col-md-6">
					<div class="form-group">
						<label for="nombre">{{ trans('palabras.nombre') }}</label>
						<input type="text" class="form-control" required name="nombre" id="Nombre"
						placeholder="{{ trans('palabras.nombre') }}">
					</div>
				</div>
				<div class="col-md-6"> 
					<div class="form-group">
						<label for="apellido">{{ trans('palabras.apellido') }}</label>
						<input type="text" class="form-control" name="apellido" id="Apellido"
						placeholder="{{ trans('palabras.apellido') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="usuario">{{ trans('palabras.usuario') }}</label>
						<input type="text" class="form-control" name="user_name" id="usuario"
						placeholder="{{ trans('palabras.usuario') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">{{ trans('palabras.email') }}</label>
						<input type="email" class="form-control" name="email" id="email"
						placeholder="{{ trans('palabras.email') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="contraseña">{{ trans('palabras.password') }}</label>
						<input type="password" class="form-control" name="password" id="password"
						placeholder="{{ trans('palabras.password') }}">
					</div>
				</div>
			    <div class="col-md-6">
					<div class="form-group">
						<label for="contraseña">{{ trans('palabras.password_confirmar') }}</label>
						<input type="password" class="form-control" name="passowrd_conf" id="passowrd_conf"
						placeholder="{{ trans('palabras.password_confirmar') }}">
					</div>
				</div>
				<div class="col-md-12" align="right">
					<a href="#" id="registerForm" class="btn btn-primary id with-arrow">{{ trans('palabras.registrarme') }}! <i class="icon-arrow-right"></i></a>
				</div>
			</form>
			</div>
		</div>
		</div>
		
	</div>

</div>
<script type="text/javascript">
	$(function(){
		user.init();
	})
</script>
@endsection