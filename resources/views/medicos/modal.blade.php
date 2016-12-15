<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registrar nuevo médico</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control inputSave" id="nombre" placeholder="Nombre..." name='nombre'
                            value='<?php echo isset($data['medico']) ? $data['medico']['NOMBRE']: ''?>'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control inputSave" id="apellido" placeholder="Apellido..." name='apellido' value='<?php echo isset($data['medico']) ? $data['medico']['APELLIDO']: ''?> '>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cédula</label>
                            <input type="text" class="form-control inputSave" id="cedula" placeholder="Cédula..." name='cedula' value='<?php echo isset($data['medico']) ? $data['medico']['CEDULA']: ''?>'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Especialidad</label>
                            <select class='form-control inputSave' id='especialidad' name='especialidad'>
                                <option value='0'>Seleccione</option>
                                <?php foreach ($data['especialidades'] as $key => $value): ?>
                                    <?php if(isset($data['medico']) and $data['medico']['FK_ESPECIALIDAD_ID'] == $value['ID']):  ?>
                                        <option value='<?php echo $value['ID']; ?>' selected>
                                    <?php else: ?>
                                        <option value='<?php echo $value['ID']; ?>'>
                                    <?php endif ?>
                                        <?php echo $value['ESPECIALIDAD']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <?php if (isset($data['medico'])): ?>
                <input type="hidden" name="id" class="inputSave" value="<?php echo $data['medico']['ID'] ?>">
                <button type="button" class="btn btn-primary save_edit">Editar</button>
                <script type="text/javascript">medicosJS.save_edit()</script>
            <?php else: ?>
                <button type="button" class="btn btn-primary save">Guardar</button>
            <?php endif ?>
        </div>    
    </div>
</div>