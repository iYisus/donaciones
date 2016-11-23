<div class="panel-body">
  <div class='col-md-12'>
<?php if(count($data['citas']['hoy']) > 0): ?>
  <?php 
  foreach ($data['especialidades'] as $key => $value): ?>
    <div class='col-md-4 especialidad especialidadPurple'>
      <b><center><?php echo $value['ESPECIALIDAD'] ?></center></b>
      <?php if( isset( ($data['citas']['hoy'][$value['ID']]) ) ): ?>
        <?php foreach ($data['citas']['hoy'][$value['ID']] as $keyc => $cita): ?>
          <div class='col-md-12'>
            <div class='col-md-9'><?php echo $cita['NOMBRE_PACIENTE']." ".$cita['APELLIDO_PACIENTE'] ?> </div>
            <div class='col-md-3'><a>Ver</a></div>
          </div>    
        <?php endforeach ?>
      <?php else: ?>
        <center>
          NO HAY CITAS ASIGNADAS
        </center>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
    <!-- <div class='col-md-4 especialidad especialidadPurple'>
      <b><center>Traumatología</center></b>
      <div class='col-md-12'>
        <div class='col-md-9'>Pedro Perez</div>
        <div class='col-md-3'><a>08:00AM</a></div>
      </div>
      <div class='col-md-12'>
        <div class='col-md-9'>Carlos Perez</div>
        <div class='col-md-3'><a>11:00AM</a></div>
      </div>
      <div class='col-md-12'>
        <div class='col-md-9'>Juan Perez</div>
        <div class='col-md-3'><a>02:30PM</a></div>
      </div>
    </div>
    <div class='col-md-4 especialidad especialidadGreen'>
      <center><b>Medicina general</b>
      <br><BR>
      NO HAY CITAS ASIGNADAS
      </center>
    </div>
    <div class='col-md-4 especialidad especialidadPurple'>
      <b><center>Odontología</center></b>
      <div class='col-md-12'>
        <div class='col-md-9'>Pedro Perez</div>
        <div class='col-md-3'><a>08:00AM</a></div>
      </div>
      <div class='col-md-12'>
        <div class='col-md-9'>Carlos Perez</div>
        <div class='col-md-3'><a>11:00AM</a></div>
      </div>
      <div class='col-md-12'>
        <div class='col-md-9'>Juan Perez</div>
        <div class='col-md-3'><a>02:30PM</a></div>
      </div>
    </div>
  </div>
</div> -->