@if(count($data['medicos']) > 0)
	@foreach ($data['medicos'] as $key => $value)
		<option value="{{ $value['ID'] }}">
			{{ $value['NOMBRE'].' '.$value['APELLIDO'] }}
	@endforeach
@else
	<option>NO HAY MÉDICOS DISPONIBLES</option>
@endif