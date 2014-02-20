<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php

include 'configuracion.php';


$nombre = $_REQUEST['campoNombre'];
$password = $_REQUEST['campoPassword'];


$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);


	if (!$con || !mysql_select_db(DB_NAME,$con)) {
		
		echo "No se ha podido conectar a la BD";

	} else {

		$sql= "SELECT * FROM usuarios WHERE nombre='$nombre' AND pass='$password'";				
		$res = mysql_query($sql,$con);	
		$filas = mysql_num_rows($res);


		if ($filas != 0) {
			
			while ($linea = mysql_fetch_array($res)) {
		
				
				if ($linea['nombre'] == $nombre && $linea['pass'] == $password) {

					$_SESSION['usuario'] = $nombre;

					header("location:principal.php");
				
				}  else if ($linea['nombre'] != $nombre || $linea['pass'] != $password) {

					echo "El usuario indicado no existe";
					
				}


					

				}
			}
		}
	

	mysql_close($con);

?>