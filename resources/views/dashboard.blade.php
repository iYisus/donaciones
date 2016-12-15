@extends('layouts.board')
@section('content')
  <div class='row'>
    <div class="col-md-12">  
    <p style='font-size: 20px'>Bienvenido, usuario.</p>
    <hr>
    </div>
  </div>
  <div class='row'>
    <div class="col-md-12">
        <!-- Eventos -->
        <div class="col-md-2">    
            <article class="white-panel">
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Nombre del evento
                </div>
                <img src="{{ asset('images/calendar.png') }}"
                    style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
                <hr>
                <p><b>05 de enero del 2017</b></p>
                <p>
                    Breve descripción del evento...
                </p>
            </article>
        </div>
        <!-- Citas -->
        <div class="col-md-2">    
            <article class="white-panel">
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Médico - Especialidad
                </div>
                <img src="{{ asset('images/med_kit.png') }}"
                    style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
                <hr>
                <p><b>08 de enero del 2017</b></p>
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Nombre del paciente
                </div>
                <p>Descripción de los sintomas o información inherente 
                al pacient, medico y/o especialidad</p>
            </article>
        </div>
        <!-- Eventos -->
        <div class="col-md-2">    
            <article class="white-panel">
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Nombre del evento
                </div>
                <img src="{{ asset('images/calendar.png') }}"
                    style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
                <hr>
                <p><b>05 de enero del 2017</b></p>
                <p>
                    Descripcion de un evento diferente, estas descripciones pueden
                    varian de tamaño
                </p>
            </article>
        </div>
        <!-- Citas -->
        <div class="col-md-2">    
            <article class="white-panel">
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Médico - Especialidad
                </div>
                <img src="{{ asset('images/med_kit.png') }}"
                    style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
                <hr>
                <p><b>08 de enero del 2017</b></p>
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Nombre del paciente
                </div>
                <p>Descripción de los sintomas o información inherente 
                al pacient, medico y/o especialidad</p>
            </article>
        </div>
        <!-- Citas -->
        <div class="col-md-2">    
            <article class="white-panel">
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Médico - Especialidad
                </div>
                <img src="{{ asset('images/med_kit.png') }}"
                    style='height: 201px;left: 292.5px;top: 0;width: 247.5px;'>
                <hr>
                <p><b>08 de enero del 2017</b></p>
                <div class="col-md-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
                    Nombre del paciente
                </div>
                <p>Descripción de los sintomas o información inherente 
                al pacient, medico y/o especialidad</p>
            </article>
        </div
    </div>
  </div>
@stop
