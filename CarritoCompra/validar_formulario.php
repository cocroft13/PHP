<?php

	include("configuracion.php");
	//$usuario = $_SESSION['usuario'];


	$nombre ="";
	$passwd = "";
	$correo = "";
	$pais = "";

	$nombre = $_REQUEST['nombre'];
	$passwd = $_REQUEST['passwd'];
	$correo = $_REQUEST['correo'];
	$pais = $_REQUEST['pais'];

	$usuario = "";
		$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if (!$con || !mysql_select_db(DB_NAME,$con)) {
			
			echo "No se ha podido conectar a la BD";
		
		} else {

			$sql = "INSERT INTO usuarios " 
					. "(nombre, contraseña, correo, pais) "
					. "VALUES "
					. "('$nombre', '$passwd', '$correo', '$pais')";

			$res = mysql_query($sql,$con);

			if (mysql_affected_rows($con)) {
					
				//DEBEMOS AGREGAR EL USUARIO Y ESTABLECER LA SESION PARA QUE AL IR A PRINCIPAL ESTE LOGUEADO
				$SESSION['usuario'] = $nombre;
				echo "<h2 align=center> Usuario registrado con exito </h2>";
				echo " <p align=\"center\"> <a href='principal.php?nombre=$nombre'> Ir a la lista de compra </a> <p>";
				

				

			} else {

				echo "No se ha insertado ninguna fila";
			}

		}
?>
