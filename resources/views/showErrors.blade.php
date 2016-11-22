<!-- ERRORES DE VALIDACION/ FORM -->
@if(count($errors) > 0)
<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
</div>
@endif
<!-- Estatus 500 -->
@if(isset($estatus) and $estatus == 500)
<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<li>{{$mensaje}}</li>
</div>
@endif
<!-- Estatus 200 -->
@if(isset($estatus) and $estatus == 200)
<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<li>{{$mensaje}}</li>
</div>
@endif