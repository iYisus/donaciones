<table class='table table-condensed'>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Cédula</th>
			<th width="20%"></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Jose</td>
			<td>García</td>
			<td>6.567.567</td>
			<td>
				<button class='btn btn-primary edit' nombre='<?php echo $key["ESPECIALIDAD"] ?>' >
        			<i class="icon-pencil"></i>
      			</button>
        		<button class='btn btn-danger desactivar'><i class="icon-remove"></i></button>
        	</td>
		</tr>
		<tr class='trDisabled'> 	
			<td>Jose</td>
			<td>García</td>
			<td>6.567.567</td>
			<td>
				<button class='btn btn-primary edit' nombre='<?php echo $key["ESPECIALIDAD"] ?>' >
        			<i class="icon-pencil"></i>
      			</button>
        		<button class='btn btn-success activar'><i class="icon-check"></i></button>
        	</td>
		</tr>
	</tbody>
</table>