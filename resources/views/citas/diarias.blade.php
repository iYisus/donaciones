<div class="panel-body">
  <div class='col-md-12'>
<?php if(isset($data['citas']['hoy']) > 0): ?>
  <?php 
  foreach ($data['especialidades'] as $key => $value): ?>
    <div class='col-md-4 especialidad especialidadPurple'>
      <b><center><?php echo $value['ESPECIALIDAD'] ?></center></b>
      <?php if( isset( ($data['citas']['hoy'][$value['ID']]) ) ): ?>
        <?php foreach ($data['citas']['hoy'][$value['ID']] as $keyc => $cita): ?>
          <div class='col-md-12'>
            <div class='col-md-9'><?php echo $cita['NOMBRE_PACIENTE']." ".$cita['APELLIDO_PACIENTE'] ?> </div>
            <div class='col-md-3'>
              <a class='edit_c' cita='<?php echo $cita['ID'] ?>'>Ver</a>
            </div>
          </div>    
        <?php endforeach ?>
      <?php else: ?>
        <center>
          NO HAY CITAS ASIGNADAS
        </center>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class='col-md-12 especialidad especialidadPurple'>
    <center>NO HAY CITAS REGISTRADAS PARA EL DÍA DE HOY</center>
  </div>
<?php endif; ?>
  </div>
</div>
<script type="text/javascript">
  citasJS.edit()
</script>