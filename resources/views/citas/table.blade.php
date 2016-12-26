<table class='table table-condensed table-striped  table-bordered' id='tblCitas'>
   <thead>
   <th>Paciente</th>
   <th>Fecha de nacimiento</th>
   <th>Médico</th>
   <th>Fecha</th>
   <th>Acciones</th>
</thead>
<tbody>
   @if (count($data['citas']) > 0)
       @foreach ($data['citas'] as $key => $value)
       <tr>
          <td>{{ $value['NOMBRE_PACIENTE'].' '.$value['APELLIDO_PACIENTE'] }}</td>
          <td>{{ $value['FECHA_PACIENTE'] }}</td>
          <td>{{ $value['MEDICO'] }}</td>
          <td>{{ $value['FECHA_CITA'] }}</td>
          <td>
             <button class='btn btn-primary edit_c' cita="{{ $value['ID'] }}" >
             <i class="icon-pencil"></i>
             </button>
             <button class='btn btn-danger cancelar' cita="{{ $value['ID'] }}">
             <i class="icon-remove"></i>
             </button>
          </td>
       </tr>
        @endforeach
    @endif
</tbody>
</table>
<script type="text/javascript">
   citasJS.cancelarCita()
   citasJS.edit()
   $("#tblCitas").DataTable({
        "scrollY": "300px",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
        },
   });
</script>