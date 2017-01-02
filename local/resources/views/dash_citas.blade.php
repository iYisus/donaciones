<!-- Citas -->
<div class="col-md-2 col-xs-12 col-sm-2">    
    <article class="white-panel">
        <div class="col-md-12 col-xs-12 col-sm-12" style='background-color: #eeeeee;border-radius: 7px; margin-bottom: 7px'>
            {{ $value['MEDICO'] }}
        </div>
        <img src="{{ asset('images/med_kit.png') }}"
            style='height: 201px;left: 292.5px;top: 0;width: 247.5px'>
        <hr>
        <p><b>{{  $value['FECHA_PACIENTE'] }}</b></p>
        <p  class="truncate">
            {{ $value['NOMBRE_PACIENTE'].' '.$value['APELLIDO_PACIENTE'] }}
        </p>
    </article>
</div>