<?php

	include("./configuracion.php");
	

	if (isset($_GET['nombre'])) {
		
		$_SESSION['usuario'] = $_GET['nombre'];
		$user = $_SESSION['usuario'];
		cabecera_html_carrito($user);
		echo "<input type=\"button\" align=\"right\" value=\"Cerrar sesion\" name=\"botonCerrarSesion\" id=\"botonCerrarSesion\" onclick=\"<?php cerrar_sesion('$user') ?>\"; <br>";
	?>
		

	<?php

	} else {

		$_SESSION['usuario'] = "";
		cabecera_html();

	}

	//echo $_SESSION['usuario'];	
?>

<table border="1" align="center" cellspacing="5">

	<tr><td align="center"> <h3>Lista de articulos </h3> </td> </tr>
	<tr><td valign="top">

	<?php
	
		$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

		if (!$con || !mysql_select_db(DB_NAME,$con)) {
			
			echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
		
		} else {

			//CONSULTAMOS LOS DATOS DE LA BD
			$sql = "SELECT * FROM productos";
			$res = mysql_query($sql,$con);
			$filas = mysql_num_rows($res);


			if ($filas != 0) {
				
				while ($linea = mysql_fetch_array($res)) {
					
					echo "<table  border=\"1\"";
					echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
					echo "<tr><th> PRODUCTO: </th><td>{$linea['nombre']} </td>";
					echo "<tr><th> PRECIO: </th><td>{$linea['precio']} </td>";
					echo "<tr><th> STOCK: </th><td>{$linea['cantidad']} </td>";
					echo "<tr><th> CANTIDAD: </th><td> <input type=\"text\">" ;
					echo "<tr><th> COMPRAR: </th><td> <input type=\"checkbox\" name=\"articulos\"> </td>";
					echo "<br>";

				}

			}

		}

	?>

</table>