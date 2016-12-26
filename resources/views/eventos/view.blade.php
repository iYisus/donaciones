<div class="modal-dialog" role="document" style="width: 750px;">
    <div class="modal-content">
      <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Registrar evento</h4>
      	</div>
      	<div class="modal-body">
	        <div class='row space'>
	        	<div class="col-md-12">
					<input type="text" name="nombre" class='form-control inputSave' value="<?php echo isset($data['evento']) ? $data['evento']['NOMBRE_EVENTO'] : '' ?>" placeholder='Nombre del evento'>
	        	</div>
			</div>
			<div class='row space'>
				<div class="col-md-6">
					<input type="text" name="fecha_inicio" class='form-control inputSave datepicker' placeholder="Fecha inicial del evento" value="<?php if (isset($data['evento'])) { echo $data['evento']['FECHA_INICIO']; } ?>">
				</div>
				<div class="col-md-6">
					<input type="text" name="fecha_fin" class='form-control inputSave datepicker' placeholder="Fecha final del evento" value="<?php echo isset($data['evento']) ? $data['evento']['FECHA_FIN'] : '' ?>">
				</div>
			</div>
			<div class='row space'>
				<div class="col-md-12">
					Descripción del evento:
					<textarea name='descripcion' id="descripcion" class='form-control inputSave'><?php echo isset($data['evento']) ? $data['evento']['DESCRIPCION'] : '' ?></textarea>
				</div>
			</div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<?php if(isset($data['evento'])): ?>
        		<input type="hidden" name="ID" value='<?php echo $data['evento']['ID'] ?>' class='inputSave'>
        		<button type="button" class="btn btn-primary" id='edit'>Actualizar</button>
        		<?php if($data['evento']['FK_ESTATUS_EVENTO_ID'] == 1): ?>
        			<button type="button" class="btn btn-success cambiarEstatus" evento=<?php echo $data['evento']['ID'] ?> estatus='2'>Archivar</button>
        			<button type="button" class="btn btn-danger cambiarEstatus" evento=<?php echo $data['evento']['ID'] ?> estatus='true'>Eliminar</button>
        		<?php endif; ?>
        		<script type="text/javascript">
        			eventosJS.editarEvento();
        			eventosJS.archivarEvento()
        		</script>
        	<?php else: ?>
        		<button type="button" class="btn btn-primary" id='save'>Registrar</button>
            <script type="text/javascript">
              eventosJS.save()
            </script>
        	<?php endif; ?>
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
      $('.datepicker').datepicker({
        minDate:  new Date(),
        dateFormat: "yy-mm-dd",
        });
      CKEDITOR.replace("descripcion"); 
    })
</script>
