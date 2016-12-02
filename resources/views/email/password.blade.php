@extends('layouts.email_template')
@section('tituloEmail')
	<b>Instrucciones para recuperar tú contraseña</b>
@endsection
@section('cuerpoEmail')
	<div style="height:100px;">
		Tu contraseña se ha reseteado. <br>
		Tu nueva contraseña es: <b>{{$string}}</b> <br>
		Una vez ingresado al sistema se recomienda modificar la contraseña a gusto del usario. <br>
		Saludos.
	</div>
	
@endsection