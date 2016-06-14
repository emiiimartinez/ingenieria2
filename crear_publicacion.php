<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	include 'funciones.php';

function generaProvincia()
{
	include 'conexion.php';
	conectar();
	$consulta=mysql_query("SELECT id, provincia FROM lista_provincias");
	desconectar();

	// Voy imprimiendo el primer select compuesto por las provincias
	echo "<select name='provincias' id='provincias' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		$registro[1]=htmlentities($registro[1]);
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
function generaTipoHospedaje()
{	
	
	$con1 = conectar1();
	$sql="SELECT * FROM tipo_alojamiento";	
	$consulta2=mysql_query($sql,$con1);
	

	// Voy imprimiendo el primer select compuesto por las provincias
	echo "<select name='alojamiento' id='alojamiento'>";
	echo "<option value='0'>Elige</option>";
	while($registro2=mysql_fetch_row($consulta2))
	{
		$registro2[1]=htmlentities($registro2[1]);
		echo "<option value='".$registro2[0]."'>".$registro2[1]."</option>";
	}
	echo "</select>";
}
?>

<?php
			if(!isset($_SESSION['loggedin'])) 
			{
				echo '<script type="text/javascript">
					alert("no esta autorizado para ver esta seccion");
					window.location="index.php"
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
    <title>Couch Inn</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="css/select_dependientes.css">-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
	
	<section>
       <div class="main">
	<div class="center">
	<h2>Publica tu couch </h2>
		<fieldset>
			<legend>
				<h4>Cual es tu direccion? </h4>
			</legend>
			<form action="insertar.php?opcion=publicacion" method="POST" name="publicacion">
			<div class="dependientes" id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" name="localidades" id="localidades">
						<option value="0">Selecciona opci&oacute;n...</option>
					</select>
				</div>
				<div id="demoIzq"><?php generaProvincia(); ?></div>
			</div><br/>
		</fieldset>
		<fieldset>
			<legend>
				<h4>Acerca del lugar </h4>
			</legend>
			<h4 class="palabras">Titulo:</h4><input class="caja" name="titulo" type="text" size="60" maxlength="60" /> <br/>
			<h4 class="palabras">Descripcion:</h4><textarea class="caja" name="descripcion"  cols="60" rows="14"></textarea><br/>
			<br/>
			<label>Tipo de hospedaje: 	<!-- </label	><SELECT NAME= "alojamiento"> 
										<OPTION VALUE=0>Alojamiento:</OPTION> 
										//	<?//=$opcion_alojamiento?> 
										</SELECT> -->
										<?php generaTipoHospedaje(); ?>
			<label> Cantidad de huespedes:</label>
				<input class="caja" name="huespedes" type="text" size="30" maxlength="30" /> 
			<br><br>
			Disponible desde: <input type="date" name="fechaDesde" id="datepicker" size="10" />
			Disponible hasta: <input type="date" name="fechaHasta" id="datepicker" size="10" />
			<br>
			<input class="btn btn-primary btn-lg" id="enviar1" name="siguiente" type="submit" value="siguiente" />
			<input class="btn btn-primary btn-lg" id="enviar2" name="cancelar" type="button" value="cancelar" onClick="location.href = 'admin.php'"/>
			
		</fieldset>
    </form>
    </div>
	</div>
    </section><!--/section-->
	
	<!-- /contenido -->
	
	<!-- Footer -->
	<?php
		
			//---Incluimos el footer
			include_once('view/footer.php');
			
	?>
	<script type="text/javascript" src="js/select_dependientes.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>