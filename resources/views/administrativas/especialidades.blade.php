@extends('layouts.board')
@section('content')
	<div class='row'>
    	<div class="col-md-12">  
    		<p style='font-size: 20px'>Gestionar especialidades</p>
    		<hr>
    	</div>
  	</div>
  	<div class="row">
  		<div class="col-md-10">
  			<form class="form-inline">
			 	<div class="form-group">
		    		<div class="input-group">
			     		<input type="text" class="form-control" id="exampleInputAmount" placeholder="Nueva especialidad">
			      		<div class="input-group-addon" style="background-color: #4db6ac;
    					color: white !important;">Registrar</div>
		    		</div>
			 	</div>
			</form>
  		</div>
  	</div>
  	<div class="row" style='padding-top:6%'>
  		<div class="col-md-10 col-md-offset-1">
  			<table class='table table-condensed table-striped'>
  				<thead>
  					<th>Nombre especialidad</th>
  					<th width='19%'></th>
  				</thead>
  				<tbody>
  					<tr>
  						<td>Odontología</td>
  						<td>
  							<button class='btn btn-primary'><i class="icon-pencil"></i></button>
  							<button class='btn btn-danger'><i class="icon-remove"></i></button>
  						</td>
  					</tr>
  					<tr>
  						<td>Medicina general</td>
  						<td>
  							<button class='btn btn-primary'><i class="icon-pencil"></i></button>
  							<button class='btn btn-danger'><i class="icon-remove"></i></button>
  						</td>
  					</tr>
  					<tr>
  						<td>Cardiología</td>
  						<td>
  							<button class='btn btn-primary'><i class="icon-pencil"></i></button>
  							<button class='btn btn-danger'><i class="icon-remove"></i></button>
  						</td>
  					</tr>
  					<tr style='border-left: solid 3px red'>
  						<td>Muesta inactiva</td>
  						<td>
  							<button class='btn btn-primary'><i class="icon-pencil"></i></button>
  							<button class='btn btn-success'><i class="icon-check"></i></button>
  						</td>
  					</tr>
  				</tbody>
  			</table>
  		</div>
  	</div>
@stop
<script type="text/javascript">
	$('#sidebarmenu').affix({
      offset: {
        top: 50
      }
    });

</script>