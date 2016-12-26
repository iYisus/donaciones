<div class="panel-body">
    <div class='col-md-12'>
        <div class='col-md-3'>Seleccione especialidad</div>
        <div class='col-md-3'>
            <select class='form-control' id='cboEspecialidad'>
                <option value='0'>Seleccione</option>
                @foreach ($data['especialidades'] as $key => $value)
                    <option value="{{ $value['ID'] }}">
                        {{ $value['ESPECIALIDAD'] }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class='col-md-12'>
        <br><br>
        <div class='row'>
            <div class='col-md-12' id="containerCitas">
                <center>SELECCIONE UNA ESPECIALIDAD PARA LISTAR LAS CITAS CORRESPONDIENTES</center>
            </div>
        </div>
    </div>
</div>