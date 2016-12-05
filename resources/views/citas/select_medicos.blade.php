<?php if(count($data['medicos']) > 0): 
	foreach ($data['medicos'] as $key => $value): ?>
		<option value='<?php echo $value['ID'] ?>'>
			<?php echo $value['NOMBRE'].' '.$value['APELLIDO'] ?>
		</option>
	<?php endforeach; ?>
<?php else: ?>
	<option>NO HAY MÉDICOS DISPONIBLES</option>
<?php endif; ?>