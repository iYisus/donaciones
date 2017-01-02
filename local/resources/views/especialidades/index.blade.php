@extends('layouts.board')
@section('content')
<!-- Titulo -->
	<div class='row'>
    <div class="col-md-12">  
    	<p class="title-board">Gestionar especialidades</p>
    	<hr>
    </div>
  </div>
  <!-- Input/boton para registrar -->
  <div class="row">
  	<div class="col-md-10 col-sm-12 col-sx-12">
  		<form class="form-inline">
			 	<div class="form-group">
		    		<div class="input-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
			     		<input type="text" class="form-control inputSave" id="nmEspecialidad" placeholder="Nueva especialidad" name='ESPECIALIDAD'>
			      	<div class="input-group-addon btn-registrar" id='save'>
                <a href="#" style='color:white'>Registrar</a>
              </div>
		    		</div>
			 	</div>
			</form>
  	</div>
  </div>
  <!-- Tabla de contenido -->
  <div class="row" style="padding-bottom: 50px;">
  	<div class="col-md-10 col-md-offset-1 " id="tbodyEspecialidades" style="min-height: 400px !important;">
  		   @include('especialidades.content')
  	</div>
  </div>
<script src="{{ asset('js/administrativos/especialidades.js') }}"></script>
@stop
