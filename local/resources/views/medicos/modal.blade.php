<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registrar nuevo médico</h4>
        </div>
        <div class="modal-body">
            <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control inputSave" id="nombre" placeholder="Nombre..." name='nombre'
                            value="{{ isset($data['medico']) ? $data['medico']['NOMBRE']: ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control inputSave" id="apellido" placeholder="Apellido..." name='apellido' 
                            value="{{  isset($data['medico']) ? $data['medico']['APELLIDO']: ''}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cédula</label>
                            <input type="text" class="form-control inputSave" id="cedula" placeholder="Cédula..." name='cedula' value="{{  isset($data['medico']) ? $data['medico']['CEDULA']: ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Especialidad</label>
                            <select class='form-control inputSave' id='especialidad' name='especialidad'>
                                <option value='0'>Seleccione</option>
                                @foreach ($data['especialidades'] as $key => $value)
                                    @if(isset($data['medico']) and $data['medico']['FK_ESPECIALIDAD_ID'] == $value['ID'])
                                        <option value="{{ $value['ID'] }}" selected>
                                    @else
                                        <option value="{{ $value['ID']}} ?>">
                                    @endif
                                         {{$value['ESPECIALIDAD']}}
                                        </option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            @if (isset($data['medico']))
                <input type="hidden" name="id" class="inputSave" value="{{ $data['medico']['ID'] }}">
                <button type="button" class="btn btn-primary save_edit">Editar</button>
                <script type="text/javascript">medicosJS.save_edit()</script>
            @else
                <button type="button" class="btn btn-primary save">Guardar</button>
            @endif
        </div>    
    </div>
</div>