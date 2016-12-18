@extends('layouts.board')
@section('content')
  <div class='row'>
    <div class="col-md-12">  
    <p style='font-size: 20px'>Bienvenido, usuario.</p>
    <hr>
    </div>
  </div>
  <div class='row'>
    <div class="col-md-12">
        <?php if(count($data) > 0 ): ?>
            <?php foreach ($data as $key => $value): ?>
                <?php if (isset($value['NOMBRE_EVENTO'])): ?>
                    @include('dash_eventos')
                <?php else: ?>
                    @include('dash_citas')   
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <center>
                <h2>NO HAY EVENTOS NI CITAS MÉDICAS EN ESPERA</h2>
            </center>
        <?php endif; ?>
    </div>
  </div>
@stop
<style type="text/css">
    .white-panel:hover {
    box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
    margin-top: -5px;
    transition: all 0.3s ease-in-out 0s;
    }
    .white-panel {
    background: white none repeat scroll 0 0;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    padding: 10px;
    position: absolute;
</style>