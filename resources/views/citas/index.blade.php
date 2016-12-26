@extends('layouts.board')
@section('content')
<script src="{{ asset('js/administrativos/citas.js') }}"></script>
  <!-- Titulo -->
	<div class='row'>
        <div class="col-md-12">  
        	<p style='font-size: 20px'>Gestionar citas médicas</p>
        	<hr>
        </div>
    </div>
    <!-- Input/boton para registrar -->
    <div class="row">
      	<div class="col-md-2">
            <div class="input-group-addon btn-registrar view_modal">
              <a href="#" style='color:white'>
                Nueva cita
              </a>
            </div>
  	     </div>
    </div>
<!-- Tabla de contenido -->
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#diarias" aria-expanded="true" aria-controls="collapseOne">
                    CITAS DEL DÍA <b>{{ date('d-m-Y')}}</b>
                </a>
            </h4>
        </div>
        <div id="diarias" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          @include('citas/proximas')
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#proximas" aria-expanded="true" aria-controls="collapseOne">
                    TODAS LAS CITAS
                </a>
            </h4>
        </div>
        <div id="proximas" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
         <br>
        @include('citas/todas_citas')
        </div>
  </div>
</div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
  <!-- Modal -->
  <div class="modal fade" id="citasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    @include('citas/modal')
  </div>

@stop
<style type="text/css">
  .trDisabled{
    border-left: solid 3px red
  }
  .btn-registrar{
    background-color: #4db6ac !important;
    color: white !important;
  }
  .especialidadPurple{
    background-color: #f7e1fb;
  }
  .especialidad{
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 150px;
  }
  .especialidadGreen{
    background-color: #e6f9f9; 
  } 
</style>