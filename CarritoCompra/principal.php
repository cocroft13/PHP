<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php

	include("./configuracion.php");
	cabecera_html();

	if (isset($_SESSION['carrito'])) {
		
		$arreglo = $_SESSION['carrito'];

		echo "<div align='left';";
		echo " <p align='left'> <b> Mi carrito: </b> </p> ";
		echo "<b> Producto adquirido: </b>" . " " . $arreglo['Nombre:'] . " " . "<br>";
		echo "<b> Cantidad adquirida: </b>" . " " . $arreglo['Cantidad:'];
		echo "</div>";

	} else {



	}

		
?>

	<?php
	
		$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

		if (!$con || !mysql_select_db(DB_NAME,$con)) {
			
			echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
		
		} else {

			//CONSULTAMOS LOS DATOS DE LA BD
			$sql = "SELECT * FROM productos";
			$res = mysql_query($sql,$con);
			$filas = mysql_num_rows($res);
			$cont = 0;

			if ($filas != 0) {
				
				while ($linea = mysql_fetch_array($res)) {

	?>

					<div align="center">
						<center>
							<img src="./img/<?php echo $linea['imagen'];?>" width="120px" height="130px"> <br>
							<span> <b> Nombre: </b> <?php echo $linea['nombre'];?></span> <br>							
							<span> <b> Precio: </b> <?php echo $linea['precio'];?> € </span> <br>
							<span> <b> Stock: </b> <?php echo $linea['cantidad'];?> uds </span> <br>													
							<a href="./carrito.php?id=<?php echo $linea['cod_producto'];?>"> Ver </a>
						</center>
					</div>
					<br>
					<br>
					<br>
					<br>
	<?php
					

				}				
			}
		}

	?>

