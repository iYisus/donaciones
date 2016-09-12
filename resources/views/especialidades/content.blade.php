<?php foreach ($data as $key): 
  if ($key['ESTATUS_REGISTRO'] == 1): ?>
	<tr class="<?php echo $key['FK_ESTATUS_ESPECIALIDAD_ID']==2 ? 'trDisabled' : '' ?>">
		<td><?php echo $key['ESPECIALIDAD'] ?></td>
		<td>
			<button class='btn btn-primary'><i class="icon-pencil"></i></button>
      <?php if ($key['FK_ESTATUS_ESPECIALIDAD_ID'] == 2) : ?>
			 <button class='btn btn-success'><i class="icon-check"></i></button>
      <?php else: ?>
        <button class='btn btn-danger'><i class="icon-remove"></i></button
        >
      <?php endif; ?>
    </td>
  </tr>
<?php endif; endforeach; ?>