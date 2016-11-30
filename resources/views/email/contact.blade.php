@extends('layouts.email_template')
@section('tituloEmail')
	<b>Conctacto / Sugerencias.</b>
@endsection
@section('cuerpoEmail')
	<div style="height:100px;">
		Nombre: <b>	{{$nombre}}</b> <br>
		Email : <b>{{$email}}</b> <br><br>
		<p>
			{{$mensaje_email}}
		</p>
	</div>
@endsection

