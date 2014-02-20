<?php

	include("./configuracion.php");
	$cod_producto = $_REQUEST['campo_cod_producto'];
	$cantidad = $_REQUEST['listaCantidad'];


	echo $cod_producto . "<br>";
	echo $cantidad;


	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

		if (!$con || !mysql_select_db(DB_NAME)) {
			
			echo "No se ha podido establecer conexion con la BD";
		
		} else {


		if (isset($_SESSION['usuario'])) {

			$sql = "UPDATE productos SET cantidad = cantidad - '$cantidad' WHERE cod_producto = '$cod_producto'";
			$res = mysql_query($sql,$con);

				if (mysql_affected_rows($con)) {
					
					echo "Se ha modificado una registro";

				} else {

					echo "No se ha modificado nada";
				}



		} else {

			echo "No has inicidado sesion. Inicia sesion para comprar" . "<br>";
			echo "<a href=./alta_usuario.php>";
		}

			
		}

	//header("location:principal.php");


?>