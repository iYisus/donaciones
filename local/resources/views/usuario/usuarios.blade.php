@extends('layouts.board')
@section('content')
<div class='row'>
    <div class="col-md-12">  
    	<p class="title-board">Gestionar Usuarios</p>
    	<hr>
    </div>
  </div>
<div class="container container-padding">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered" id="users-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Usuario</th>
							<th>Tipo </th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id='token'>
<div class="modal fade" id="usuariosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
</div>
<script src="{{ asset('js/user.js') }}"></script>
<script type="text/javascript">
	$(function(){
		user.users();
	})
</script>
@endsection