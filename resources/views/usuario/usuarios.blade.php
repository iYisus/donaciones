@extends('layouts.board')
@section('content')
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
<script src="{{ asset('js/user.js') }}"></script>
<script type="text/javascript">
	$(function(){
		user.users();
	})
</script>
@endsection