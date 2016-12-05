<thead>
    <th>Paciente</th>
    <th>Edad</th>
    <th>Médico</th>
    <th>Fecha</th>
    <th></th>
</thead>
<tbody>
    <?php if (count($data['citas']) > 0): ?>
        <?php foreach ($data['citas'] as $key => $value): ?>
            <tr>
                <td><?php echo $value['NOMBRE_PACIENTE'].' '.$value['APELLIDO_PACIENTE'] ?></td>
                <td><?php echo $value['EDAD_PACIENTE'] ?></td>
                <td><?php echo $value['MEDICO'] ?><td>
                <td><?php echo $value['FECHA_CITA'] ?></td>
                <td>
                    <button class='btn btn-primary edit_c' cita='<?php echo $value['ID'] ?>' >
                        <i class="icon-pencil"></i>
                    </button>
                    <button class='btn btn-danger cancelar' cita='<?php echo $value['ID'] ?>'>
                        <i class="icon-remove"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">
                <center>NO HAY CITAS EN ESTA ESPECIALIDAD</center>
            </td>
        </tr>
    <?php endif; ?>
</tbody>
<script type="text/javascript">
    citasJS.cancelarCita()
    citasJS.edit()
</script>