<div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Editar / Estatus Usuario</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
            <label for="exampleInputEmail1">Estatus de Usuario</label>
            <select class='form-control inputSave' id='estatus' name='estatus'>
                                <option value='0'>Seleccione</option>
                                @foreach ($data['estatus'] as $value)
                                    @if($data['user']['FK_ESTATUS_USUARIO_ID'] == $value->ID)
                                        <option value="{{ $value->ID }}" selected>
                                    @else
                                        <option value="{{ $value->ID}}">
                                    @endif
                                         {{$value->DESCRIPCION}}
                                        </option>
                                @endforeach  
                            </select>
            
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Tipo del usuario</label>
            <select class='form-control inputSave' id='tipo_usuario' name='tipo_usuario'>
                                <option value='0'>Seleccione</option>
                                @foreach ($data['roles'] as $value)
                                    @if($data['user']['FK_ROL_ID'] == $value->ID)
                                        <option value="{{ $value->ID }}" selected>
                                    @else
                                        <option value="{{ $value->ID}}">
                                    @endif
                                         {{$value->DESCRIPCION}}
                                        </option>
                                @endforeach  
                            </select>
         </div>
      </div>
      <div class="modal-footer">
        <input type="hidden"  id="id_user" name="id_user" class="inputSave" value="{{ $data['user']['id'] }}">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <button type="button" id="actualizarUsuario" class="btn btn-primary">Aceptar</button>
      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script type="text/javascript">
  user.editar_user(); 
</script>
