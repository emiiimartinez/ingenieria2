<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
		<title>Nuevo tipo de hospedaje</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		
		
</head>

<body>
	<?php 
		$mensaje = $_REQUEST['msj'];
		if ($mensaje == "error"){
			echo "El tipo de hospedaje insertado ya existe<br/>";
		}
		if ($mensaje == "vacio"){
			echo "El campo tipo de hospedaje esta vacio<br/>";
		}
		if ($mensaje == "exito"){
			echo "El tipo de hospedaje fue agregado con exito <br/>";
		}
	?>

	<div class="bg3">
		<fieldset>
			<legend>
				<h4>Agregar un nuevo tipo de hospedaje </h4>
			</legend>
			<form action="insertar.php?opcion=tipoHospehaje" method="POST" name="talojamiento" id="talojamiento" >
			<input class="caja" name="alojamiento" id="alojamiento" type="text" size="60" maxlength="60" /> <br/>
			<input id="enviar" name="agregar" type="submit" value="agregar" />
		</fieldset>	
	
	</div>
</body>