<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
@extends('layouts.board')
@section('content')
  <!-- Titulo -->
	<div class='row'>
    <div class="col-md-12">  
    	<p style='font-size: 20px'>Gestionar médicos</p>
    	<hr>
    </div>
  </div>
  <!-- Input/boton para registrar -->
  <div class="row">
  	<div class="col-md-2">
      <div class="input-group-addon btn-registrar" id='save'>Registrar</div>
  	</div>
  </div>
  <!-- Tabla de contenido -->
  <div class="row" style='padding-top:6%'>
  	<div class="col-md-10 col-md-offset-1">
      @include('medicos.content')
  	</div>
  </div>
@stop

<script src="{{ asset('js/administrativos/medicos.js') }}"></script>
<style type="text/css">
  .trDisabled{
    border-left: solid 3px red
  }
  .btn-registrar{
    background-color: #4db6ac !important;
    color: white !important;
  }
</style>