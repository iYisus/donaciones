@extends('layouts.board')
@section('content')
<script src="{{ asset('js/administrativos/eventos.js') }}"></script>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
  <!-- Titulo -->
	<div class='row'>
    <div class="col-md-12">  
    	<p style='font-size: 20px'>Gestionar eventos</p>
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
              <div class="input-group-addon btn-registrar modal-registrar">
              <!-- data-toggle="modal" data-target="#eventoModal" -->
                <a href="#" style="color:white">
                  Registrar evento
                </a>
              </div>
		    		</div>
			 	</div>
			</form>
  	</div>
  </div>
  <!-- Tabla de contenido -->
  <div class="row" style='padding-top:6%'>
  	<div class="col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-md-6 divEventos divEventosEspera">
          @include('eventos.content_espera')
        </div>
        <div class="col-md-6 divEventos divEventosArchivados">
          @include('eventos.content_archivados')
        </div>
      </div>
  	</div>
  </div>
<!-- Modal -->
<div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  @include('eventos.view')
</div>
<style type="text/css">
  .divEventos{
    border: 1px solid #ccc;
    height: 400px;
  }
  .titleDivEventos{
    border-bottom: 1px solid #ccc;
    padding: 8px;
  }
  .shadowBox{
     box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3)
  }
  .margintopBox{
    margin-top: 20px;
  }
  .archivados{
    background-color: #fdaa91;
  }
  .espera{
    background-color: #A2DED0;
  }
</style>  
@stop
