<div class="modal-dialog" role="document">
    <div class="modal-content">
     	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">
                <?php echo isset($data['cita']) ? 'Editar cita' : 'Registrar cita' ?> 
            </h4>
      	</div>
      	<div class="modal-body">
	        <div class='row space'>
                <div class="col-md-10 col-md-offset-1">
                    <select class='form-control inputSave' name='especialidad' id='especialidad'>
                        <option value='0'>Seleccione una especialidad</option>   
                        <?php foreach ($data['especialidades'] as $key => $value): ?>
                            <?php if(isset($data['cita']) and $data['cita']['FK_ESPECIALIDAD_ID'] == $value['ID']): ?>
                                <option value="<?php echo $value['ID'] ?>" selected>
                            <?php else: ?>
                                <option value="<?php echo $value['ID'] ?>">
                            <?php endif; ?>
                                    <?php echo $value['ESPECIALIDAD'] ?>
                                </option>
                        <?php endforeach; ?>
                    </select>
                </div>
			</div>
			<div class='row space'>
                <div class="col-md-10 col-md-offset-1">
                    <select class='form-control inputSave' name='medico' id='medico'
                    <?php echo isset($data['cita']) ? '' : 'readonly' ?> >
                        <?php if(isset($data['cita'])): ?>
                            <?php foreach ($data['medicos'] as $key => $value): ?>
                                <option value='<?php echo $value['ID'] ?>'>
                                    <?php echo $value['NOMBRE'].' '.$value['APELLIDO'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value='0'>DEBE SELECCIONAR UNA ESPECIALIDAD</option>   
                        <?php endif; ?>
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
                    <input type="text" name="pnombre" class='form-control inputSave' placeholder='Nombre del paciente' value="<?php echo isset($data['cita']) ? $data['cita']['NOMBRE_PACIENTE'] : '' ?> ">
                </div>
                <div class="col-md-5">
                    <input type="text" name="papellido" class='form-control inputSave' placeholder="Apellido del paciente" value="<?php echo isset($data['cita']) ? $data['cita']['APELLIDO_PACIENTE'] : '' ?> ">
                </div>
            </div>
            <br>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    Edad
                </div>
                <div class="col-md-5">
                    Fecha de la cita
                </div>
            </div>
            <div class='row'>
                <div class="col-md-5 col-md-offset-1">
                    <input type="text" name="pedad" class='form-control inputSave' placeholder='Edad del paciente' value="<?php echo isset($data['cita']) ? $data['cita']['EDAD_PACIENTE'] : '' ?> ">
                </div>
                <div class="col-md-5">
                    <input type="text" name="fecha" class='form-control inputSave' placeholder="Fecha de la cita" value="<?php echo isset($data['cita']) ? $data['cita']['FECHA_CITA'] : '' ?> ">
                </div>
            </div>
      	</div>
      	<div class="modal-footer">
            <?php if(isset($data['cita'])): ?>
                <input type="hidden" name="ID" value='<?php echo $data['cita']['ID'] ?>' class='inputSave'>
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
                citasJS.modalMedicos()
    		</script>
     	</div>
    </div>
 </div>
 <style type="text/css">
 	.space{
 		padding: 1em 0 1em 0
 	}
 </style>