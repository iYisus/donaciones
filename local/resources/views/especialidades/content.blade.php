<table  id="especialidad" class='table table-bordered table-condensed table-striped'>
        <!-- Titulos de la tabla -->
        <thead>
          <th>Nombre especialidad</th>
          <th width='30%'>Acciones</th>
        </thead>
        <!-- Contenido de la tabla -->
        <tbody id='tbodyEspecialidades'>
       @if(count($data) == 0)
  <tr>
    <td colspan='2'> 
      <center>AÚN NO HAY ESPECIALIDADES REGISTRADAS</center>
    </td>
  </tr>
@else
  @foreach ($data as $key) 
    @if ($key['ESTATUS_REGISTRO'] == 1)
        <tr class="{{ $key['FK_ESTATUS_ESPECIALIDAD_ID']== 2 ? 'trDisabled' : '' }}">
      <td><?php echo $key['ESPECIALIDAD'] ?></td>
      <td>
        <button class='btn btn-primary edit' nombre='{{ $key["ESPECIALIDAD"] }}' 
                reg='{{ $key["ID"] }}'>
          <i class="icon-pencil"></i>
        </button>
        @if ($key['FK_ESTATUS_ESPECIALIDAD_ID'] == 2)
          <button class='btn btn-success estatus' reg='{{ $key["ID"] }}' estatus='1'>
            <i class="icon-check"></i>
          </button>
        @else
          <button class='btn btn-danger estatus' reg='{{  $key["ID"] }}' estatus='2'>
            <i class="icon-remove"></i>
          </button>
        @endif
        <button class='btn btn-danger eliminar' especialidad='{{  $key["ID"] }}' '>
            <i class="icon-trash"></i>
          </button>
      </td>
    </tr>
    @endif
  @endforeach
@endif
  </tbody>
</table>
<script type="text/javascript">
$(function(){
  especialidadesJS.edit();
  especialidadesJS.estatus();
  especialidadesJS.delete_especialidad();
  var table = $('#especialidad').DataTable({
    "scrollY": "350px",
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
    }
   });
  })
</script>