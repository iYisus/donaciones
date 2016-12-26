<div class="modal-dialog" role="document" style="width: 750px;">
    <div class="modal-content">
      <div class="modal-header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h6 class="modal-title" id="">{{ trans('informacion.titulo_evento') }}!</h6>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">{{ $eventos["NOMBRE_EVENTO"]  }}</div>
              <div class="panel-body">
                <b>Fecha Inicio: </b>{{$eventos["FECHA_INICIO"]}} / <b>Fecha Fin: </b> {{$eventos["FECHA_FIN"]}}
              <hr>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                      {!! $eventos["DESCRIPCION"] !!}
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal"  class="btn btn-primary"> {{ trans('palabras.aceptar') }} </button>
      </div>
    </div>
  </div>
  