<?php if ( isset( $data['medicos'][$key['ID']] ) ): ?>
	<table class='table table-condensed'>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cédula</th>
				<th width="20%"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data['medicos'][$key['ID']] as $key2 => $value): ?>
				<tr>
					<td> <?php echo($value['NOMBRE']);?> </td>
					<td> <?php echo($value['APELLIDO']);?> </td>
					<td> <?php echo($value['CEDULA']);?> </td>
					<td>
						<button class='btn btn-primary edit' medico='<?php echo $value["ID"] ?>' >
		        			<i class="icon-pencil"></i>
		      			</button>
		      			<?php if($value['FK_ESTATUS_MEDICOS_ID'] == 1): ?>
		        			<button class='btn btn-danger estatus' medico='<?php echo $value['ID'] ?>' estatus='2'>
		        				<i class="icon-remove"></i>
		        			</button>
		        		<?php else: ?>
		        			<button class='btn btn-success estatus' medico='<?php echo $value['ID'] ?>' estatus='1'>
		        				<i class="icon-check"></i>
		        			</button>
		        		<?php endif; ?>
		        	</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="row">
		<center>	
			<h5> AÚN NO HAY MÉDICOS REGISTRADOS PARA ESTA ESPECIALIDAD </h5>
			<div class="col-md-3 col-md-offset-4">
		    	<div class="input-group-addon btn_registrar btn-registrar-esp" esp='<?php echo $key['ID'] ?>'>
		    		<a href="#" style='color:white'>
		    			Registrar
		    		</a>
		    	</div>
			</div>
		</center>
  	</div>
<?php endif; ?>