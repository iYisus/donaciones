<div class="panel-body">
    <div class='col-md-12'>
        <div class='col-md-3'>Seleccione especialidad</div>
        <div class='col-md-3'>
            <select class='form-control' id='cboEspecialidad'>
                <option value='0'>Seleccione</option>
                <?php foreach ($data['especialidades'] as $key => $value): ?>
                    <option value="<?php echo $value['ID'] ?>">
                        <?php echo $value['ESPECIALIDAD'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr>
    <div class='col-md-12'>
        <br><br>
        <?php if(isset($data['citas']['proximas'])) ?>
        <div class='row'>
            <div class='col-md-12'>
                <table class='table table-condensed' id='tblCitas'>
                    <thead>
                        <tr>
                            <th>
                                <center>SELECCIONE UNA ESPECIALIDAD PARA LISTAR LAS CITAS CORRESPONDIENTES</center>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>