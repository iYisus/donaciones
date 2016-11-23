
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
@extends('layouts.board')
@section('content')
  <!-- Titulo -->
	<div class='row'>
    <div class="col-md-12">  
    	<p style='font-size: 20px'>Gestionar especialidades</p>
    	<hr>
    </div>
  </div>
  <!-- Input/boton para registrar -->
  <div class="row">
  	<div class="col-md-10">
  		<form class="form-inline">
			 	<div class="form-group">
		    		<div class="input-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
			     		<input type="text" class="form-control inputSave" id="nmEspecialidad" placeholder="Nueva especialidad" name='ESPECIALIDAD'>
			      	<div class="input-group-addon btn-registrar" id='save'>Registrar</div>
		    		</div>
			 	</div>
			</form>
  	</div>
  </div>
  <!-- Tabla de contenido -->
  <div class="row" style='padding-top:6%'>
  	<div class="col-md-10 col-md-offset-1">
  		<table class='table table-condensed table-striped'>
        <!-- Titulos de la tabla -->
				<thead>
					<th>Nombre especialidad</th>
					<th width='19%'></th>
				</thead>
        <!-- Contenido de la tabla -->
				<tbody>
          @include('especialidades.content')
				</tbody>
  		</table>
  	</div>
  </div>
@stop
<script src="{{ asset('js/administrativos/especialidades.js') }}"></script>