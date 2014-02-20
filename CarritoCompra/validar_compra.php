<?php

	include("./configuracion.php");
	
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

		if (!$con || !mysql_select_db(DB_NAME)) {
			
			echo "No se ha podido establecer conexion con la BD";
		
		} else {


		if (isset($_SESSION['usuario'])) {

			$nombre = $_REQUEST['campo_nombre_producto'];
			$cod_producto = $_REQUEST['campo_cod_producto'];
			$cantidad = $_REQUEST['listaCantidad'];
			$precio = $_REQUEST['campo_precio_producto'];
			

			$arreglo = array("Id" => $_POST['campo_cod_producto'],
							 "Nombre:" => $nombre,
							 "Cantidad:" => $cantidad + $cantidad);


			$_SESSION['carrito'] = $arreglo;


			$sql = "UPDATE productos SET cantidad = cantidad - '$cantidad' WHERE cod_producto = '$cod_producto'";
			$res = mysql_query($sql,$con);

				if (mysql_affected_rows($con)) {
					
					header('location:principal.php?id_producto=' . $cod_producto);

				} else {

					echo "No se ha modificado nada";
				}

		} else {

			echo "No has inicidado sesion. Inicia sesion para comprar" . "<br>";
			echo "<a href=./alta_usuario.php>";
		}

			
		}
?>