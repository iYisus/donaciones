@extends('layouts.master')
@section('content')
<div class="container container-padding">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#Nombre" aria-controls="Nombre" role="tab" data-toggle="tab">Nombre</a></li>
				<li role="presentation"><a href="#contraseña" aria-controls="contraseña" role="tab" data-toggle="tab">Contraseña</a></li>
				<li role="presentation"><a href="#correo" aria-controls="correo" role="tab" data-toggle="tab">Correo</a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="Nombre">

			</div>
				<div role="tabpanel" class="tab-pane" id="contraseña">...</div>
				<div role="tabpanel" class="tab-pane" id="correo">...</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection