<?php
    session_start();
   	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
    // comprobamos que se haya iniciado la sesión
    if(isset($_SESSION['loggedin'])) 
    {
		session_unset();
        session_destroy();
        
       header("Location: index.php?msj=exito");
        
    }else {
        echo "Operación incorrecta.";
    }
?> 
