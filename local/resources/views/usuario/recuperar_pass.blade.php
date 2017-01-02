@extends('layouts.master')
@section('content')
<div class="container container-padding">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
			<div class="panel panel-primary	">
				<div class="panel-heading">
					<h3 class="panel-title "><i class="icon-lock"></i> {{ trans('texto.recuperar_contraseña') }} <i class="icon-arrow-left  pull-right" onclick="history.go(-1);" style="cursor:pointer;"></i>	</h3>
				</div>
				<div class="panel-body">	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							@include('showErrors')
							<h4>{{ trans('texto.recuperar_contraseña_titulo') }}.</h4>
							<form action="{{URL('password')}}" method="post" name="recoveryForm" id="recoveryForm">
								<div class="form-group">
									{{ csrf_field() }}
									<input type="text" class="form-control"  name="email" id="email"
									placeholder="{{ trans('palabras.email') }}">
								</div>
							</form>
								<div class="form-group pull-right">
									<a href="#" id="recoveryPassword" class="btn btn-primary id with-arrow">{{ trans('palabras.enviar') }}! <i class="icon-arrow-right"></i></a>
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
		user.recoveryPassword();
	})
</script>
@endsection
