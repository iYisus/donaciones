@extends('layouts.master')
@section('content')
<div class="container container-padding">
	<div class="row">
		<div class="col-md-10 col-md-offset-1	">
		@if(session('insert_200'))
		    <div class="alert alert-success">
		      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		       <i class="icon-check"></i>&nbsp;<strong>{{session('insert_200')}}</strong>
		    </div>
		@endif
		@if(session('insert_500'))
		    <div class="alert alert-danger">
		      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		       <i class="icon-warning"></i>&nbsp;<strong>{{session('insert_500')}}</strong>
		    </div>
		@endif
		<div class="panel panel-primary	">
			<div class="panel-heading">
					<h3 class="panel-title "><i class="icon-users"></i> Registrar Usuario <i class="icon-arrow-left  pull-right" onclick="history.go(-1);" style="cursor:pointer;"></i>	</h3>
			</div>
			<div class="panel-body">
			@if(count($errors) > 0)
				<div class="alert alert-danger">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      @foreach($errors->all() as $error)
						<li>{{$error}}</li>
			      @endforeach
			    </div>
			@endif
			<form action="{{URL::route('usuario.store')}}" method="POST" id="registrarUsuario">
			{{ csrf_field() }}
			<div class="col-md-6">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" required name="nombre" id="Nombre"
						placeholder="Introduce tu Nombre">
					</div>
				</div>
				<div class="col-md-6"> 
					<div class="form-group">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="Apellido"
						placeholder="Introduce tu Apellido">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="usuario">Nombre de Usuario</label>
						<input type="text" class="form-control" name="user_name" id="usuario"
						placeholder="Introduce tu Nombre de Usuario">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email"
						placeholder="Introduce tu Email">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="contraseña">Contraseña</label>
						<input type="password" class="form-control" name="password" id="password"
						placeholder="Introduce tu Contraseña">
					</div>
				</div>
			    <div class="col-md-6">
					<div class="form-group">
						<label for="contraseña">Confirmar Contraseña</label>
						<input type="password" class="form-control" name="passowrd_conf" id="passowrd_conf"
						placeholder="Confirmar tu Contraseña">
					</div>
				</div>
				<div class="col-md-12" align="right">
					<a href="#" id="registerForm" class="btn btn-primary id with-arrow">Registrarme! <i class="icon-arrow-right"></i></a>
				</div>
			</form>
			</div>
		</div>
		</div>
		
	</div>

</div>
<script type="text/javascript">
	user.init();
</script>
@endsection