@extends('layouts.board')
@section('content')
<!-- Titulo -->
	<div class='row'>
    <div class="col-md-12">  
    	<p class="title-board">Gestionar médicos</p>
    	<hr>
    </div>
  </div>
  <!-- Input/boton para registrar -->
  <div class="row">
  	<div class="col-md-2">
      <div class="input-group-addon btn-registrar" data-toggle="modal" data-target="#medicosModal">
        <a href="#" style='color:white'>
          Nuevo Médico
        </a>
      </div>
  	</div>
  </div>
  <!-- Tabla de contenido -->
  <div class="row" style='padding-top:6%'>
  	<div class="col-md-10 col-md-offset-1">
      @include('medicos.table')
  	</div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
  <!-- Modal -->
  <div class="modal fade" id="medicosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    @include('medicos.modal')
  </div>
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
@stop
