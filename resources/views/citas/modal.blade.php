<div class="modal-dialog" role="document">
    <div class="modal-content">
     	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">
                {{ isset($data['cita']) ? 'Editar cita' : 'Registrar cita' }} 
            </h4>
      	</div>
      	<div class="modal-body">
	        <div class='row space'>
                <div class="col-md-10 col-md-offset-1">
                    <select class='form-control inputSave' name='especialidad' id='especialidad'>
                        <option value='0'>Seleccione una especialidad</option>   
                        @foreach ($data['especialidades'] as $key => $value)
                             @if(isset($data['cita']) and $data['cita']['FK_ESPECIALIDAD_ID'] == $value['ID'])
                                <option value="{{ $value['ID'] }}" selected>
                            @else
                                <option value="{{ $value['ID'] }}">
                            @endif
                                 {{ $value['ESPECIALIDAD'] }}                             
                                 </option>
                        @endforeach
                    </select>
                </div>
			</div>
			<div class='row space'>
                <div class="col-md-10 col-md-offset-1">
                    <select class='form-control inputSave' name='medico' id='medico'
                    <?php echo isset($data['cita']) ? '' : 'readonly' ?> >
                        @if(isset($data['cita']))
                            @foreach ($data['medicos'] as $key => $value)
                                <option value="{{ $value['ID'] }}">
                                    {{ $value['NOMBRE'].' '.$value['APELLIDO'] }}
                                </option>
                            @endforeach
                            @else
                            <option value='0'>DEBE SELECCIONAR UNA ESPECIALIDAD</option>   
                            @endif
                    </select>
                </div>
            </div>
            <div class='row space'>
                <div class="col-md-10 col-md-offset-1">
                    <center><H4>INFORMACIÓN DEL PACIENTE</H4></center>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    Nombre
                </div>
                <div class="col-md-5">
                    Apellido
                </div>
            </div>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    <input type="text" name="pnombre" class='form-control inputSave' placeholder='Nombre del paciente' value="{{  isset($data['cita']) ? $data['cita']['NOMBRE_PACIENTE'] : '' }} ">
                </div>
                <div class="col-md-5">
                    <input type="text" name="papellido" class='form-control inputSave' placeholder="Apellido del paciente" value="{{ isset($data['cita']) ? $data['cita']['APELLIDO_PACIENTE'] : '' }} ">
                </div>
            </div>
            <br>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    Fecha de Nacimiento
                </div>
                <div class="col-md-5">
                    Fecha de la cita
                </div>
            </div>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    <input type="text" name="fechap" id="fechap" class='form-control inputSave' placeholder='Fecha de Nacimiento' value="{{ isset($data['cita']) ? $data['cita']['FECHA_PACIENTE'] : '' }} ">
                </div>
                <div class="col-md-5">
                    <input type="text" name="fecha" class='form-control inputSave datepicker' placeholder="Fecha de la cita" value="{{ isset($data['cita']) ? $data['cita']['FECHA_CITA'] : '' }} ">
                </div>
            </div>
            @if (isset($data['estatus']))
            <div class="row">
               <div class="col-md-5 col-md-offset-1"> Estatus de cita </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <select class='form-control inputSave' id="estatus_cita"  name="estatus_cita" >
                        @foreach ($data['estatus'] as $key => $value)
                            @if ($data["cita"]["FK_ESTATUS_CITA_ID"] == $value->ID)
                            <option value="{{ $value->ID }}" selected="">
                                {{ $value->DESCRIPCION }}
                            </option>
                            @else
                            <option value="{{ $value->ID }}">
                                {{ $value->DESCRIPCION }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
                
            @endif
      	</div>
      	<div class="modal-footer">
            <?php if(isset($data['cita'])): ?>
                <input type="hidden" name="ID" value=" {{ $data['cita']['ID'] }}" class='inputSave'>
                <button type="button" id='edit' class="btn btn-primary">Actualizar Cita</button>
                <script type="text/javascript">
                    citasJS.actualizar_cita()
                </script>
            <?php else: ?>    
                <button type="button" id='save' class="btn btn-primary"" disabled="True">Registrar Cita</button>
                <script type="text/javascript">
                    citasJS.save()
                </script>
            <?php endif; ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <script type="text/javascript">
                citasJS.modalCitas()
    		</script>
     	</div>
    </div>
 </div>
 <style type="text/css">
 	.space{
 		padding: 1em 0 1em 0
 	}
 </style>
<script type="text/javascript">
$(function(){
    citasJS.datepicker();
})
</script>