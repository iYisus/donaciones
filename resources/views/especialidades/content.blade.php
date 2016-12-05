<?php if(count($data) == 0): ?>
  <tr>
    <td colspan='2'> 
      <center>AÚN NO HAY ESPECIALIDADES REGISTRADAS</center>
    </td>
  </tr>
<?php else: ?>
  <?php foreach ($data as $key): 
    if ($key['ESTATUS_REGISTRO'] == 1): ?>
  	<tr class="<?php echo $key['FK_ESTATUS_ESPECIALIDAD_ID']==2 ? 'trDisabled' : '' ?>">
  		<td><?php echo $key['ESPECIALIDAD'] ?></td>
  		<td>
  			<button class='btn btn-primary edit' nombre='<?php echo $key["ESPECIALIDAD"] ?>' 
                reg='<?php echo $key["ID"] ?>'>
          <i class="icon-pencil"></i>
        </button>
        <?php if ($key['FK_ESTATUS_ESPECIALIDAD_ID'] == 2) : ?>
  			  <button class='btn btn-success estatus' reg='<?php echo $key["ID"] ?>' estatus='1'>
            <i class="icon-check"></i>
          </button>
        <?php else: ?>
          <button class='btn btn-danger estatus' reg='<?php echo $key["ID"] ?>' estatus='2'>
            <i class="icon-remove"></i>
          </button>
        <?php endif; ?>
      </td>
    </tr>
  <?php endif; endforeach;
endif;?>
<script type="text/javascript">
  especialidadesJS.edit();
  especialidadesJS.estatus();
</script>