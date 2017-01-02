@extends('layouts.master_errors')
@section('content')
<style>
.center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
</style>
<div class="container container-padding">
    <div class="row">
        <div class="span12">
          <div class="hero-unit center">
          <div class="jumbotron">
              <h1>¡Ooops algo ha ido muy mal.!</h1>
              <p><b>Presiona el boton para volver!</b></p>
              <a href="{{URL('/')}}" class="btn btn-large btn-primary"><i class="icon-home icon-white"></i> Inicio </a>
          </div>
        </div>
        </div>
    </div>
</div>
@endsection
