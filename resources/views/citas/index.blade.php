<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
@extends('layouts.board')
@section('content')
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
      <div class="input-group-addon btn-registrar" data-toggle="modal" data-target="#medicosModal">
        Nueva cita
      </div>
  	</div>
  </div>
<!-- Tabla de contenido -->
<br>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#diarias" aria-expanded="true" aria-controls="collapseOne">
        CITAS DEL DÍA (2-11-2016)
        </a>
      </h4>
    </div>
    <div id="diarias" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      @include('citas/diarias')
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#proximas" aria-expanded="true" aria-controls="collapseOne">
        PRÓXIMAS CITAS
        </a>
      </h4>
    </div>
    <div id="proximas" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class='col-md-12'>
          <div class='col-md-3'>Seleccione especialidad</div>
          <div class='col-md-3'><select class=''>
            <option>Seleccione</option>
            <option>Traumatología</option>
            <option>Medicina general</option>
            <option>Odontología</option>
          </select></div>
          <div class='col-md-2'>Fecha</div>
          <div class='col-md-3'><input type="text" name="" placeholder=""></div>
        </div>
        <hr>
        <div class='col-md-12'>
        <br><br>
        <table class='table table-condensed'>
          <thead>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Fecha - Hora</th>
            <th></th>
          </thead>
          <tbody>
            <td>Maria Garcia</td>
            <td>Pedro Perez</td>
            <td>03/11/2016 - 10:00 AM</td>
            <td>
              <button class='btn btn-primary edit' nombre='' >
                  <i class="icon-pencil"></i>
              </button>
              <button class='btn btn-danger estatus' medico='' estatus='2'>
                  <i class="icon-remove"></i>
              </button>
            </td>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Tabla de contenido -->
  <div class="row" style='padding-top:6%'>
  	<div class="col-md-10 col-md-offset-1">
      
  	</div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
  <!-- Modal -->
  <div class="modal fade" id="medicosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    
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