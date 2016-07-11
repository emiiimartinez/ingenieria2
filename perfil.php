<?php
	include 'funciones.php';
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$mail= $_SESSION['mail'];
	$sql="SELECT * FROM usuarios WHERE email='$mail'";
	$perfil = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    if(mysqli_num_rows($perfil))
    {
        $row = mysqli_fetch_array($perfil);
        $email = $row["email"];
        $nameu = $row["nombre"];
		$apellido=$row["apellido"];
        $id=$row["id_usuario"];
		$tel = $row["telefono"];
    }
    else
    {
		echo '<script type="text/javascript">
					alert("El usuario no esta registrado o elimino su cuenta");
					window.location="cambiar_contrasenia.php"
				</script>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn | Mi perfil</title>

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/sillon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script type="text/javascript">
		function preguntaEliminarCuenta(){
			if (confirm('¿Esta seguro que desea eliminar la cuenta?')){
				window.location.href = "insertar.php?opcion=eliminarCuenta&cuenta=<?php echo $id ?>";
			}			
		}
	</script>
</head><!--/head-->

<body class="homepage">

    <header id="header">

		<?php

			//---Incluimos la barra superior
			include_once('view/topBar.php');

			//---Incluimos el nav
			include_once('view/navBar.php');

		?>

    </header><!--/header-->
	<!-- Contenido de la pagina -->

	<section id="perfil">
		<div class="center">
			<h2>Perfil de <?=$nameu?> </h2>
		</div>
		<div class="center">
			<div id="perfil">
				<?php if ($row['tipo_foto'] == null){
					echo "<img class='img-circle' src='images/foto-de-perfil.png' width='150' height='150'/>";
				}else{ ?>
					<img src="imagenUsuario.php?id= <?php echo $id ?>" class="img-circle" width="150" height="150" />
				<?php } ?>
					<br>
					<strong>Nombre:</strong> <?=$nameu?>
					<strong> </strong> <?=$apellido?>
					<br>
					<strong>Email:</strong> <?=$email?>
					<br>
					<strong>Telefono:</strong> <?=$tel?>
					<br>
					<input class="btn btn-primary btn-lg" id="EliminarCuenta" name="EliminarCuenta" type="button" value="Eliminar cuenta" onClick="preguntaEliminarCuenta()"/>
					<input class="btn btn-primary btn-lg" id="modificarMisDatos" name="modificarMisDatos" type="button" value="Modificar mis datos" onClick="location.href = 'modificar_datosU.php?mail=<?=$email?>'"/>
					<br>
			</div>
		</div>
	</section>
	<section id="listados">
		<div class="center" id="listados">
			<h2>Mis publicaciones </h2>
		<hr/>

		<?php include_once('listado.php'); ?>
		
		</div>
    </section><!--/section-->

	<!-- /contenido -->

	<!-- Footer -->
	<?php

			//---Incluimos el footer
			include_once('view/footer.php');

	?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
