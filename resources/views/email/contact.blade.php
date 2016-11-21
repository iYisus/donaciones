<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Instituto de Previsión del Niño</title>
</head>
<body>
	<div style="display:block;width:95%;height:20px;background-color:#e5e5e5;padding: 5px;border-radius:5px;font-style:bold;font-size:14px;font-color:#fff !important">
		<div align="left" style="width:25%;position:relative;float:left;padding:2px;">
			Instituto de Previsión del Niño
		</div>
		<div align="center" style="width:30%;position:relative;float:left;padding:2px;">
			Nombre: {{$nombre}}
		</div>
		<div style="width:40%;position:relative;float:left;padding:2px;" align="right">
			Correo: <span  style="a:link{}">{{$email}}</span>
		</div>
	</div>
		<div style="display:block;padding:5px;width:100% !important;min-height:300px;">
				<p style="text-align:justify;font-size:13px;">
					<strong>Mensaje: <br></strong>
					{{$mensaje}}
				</p>
		</div>
</body>
</html>

