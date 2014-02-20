<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

	include("./configuracion.php");

	cabecera_html();

		$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

		if (!$con || !mysql_select_db(DB_NAME,$con)) {
			
			echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
		
		} else {

			//CONSULTAMOS LOS DATOS DE LA BD
			$sql = "SELECT * FROM productos WHERE cod_producto=" . $_GET['id'];
			$res = mysql_query($sql,$con); 
			$filas = mysql_num_rows($res);
			$cont = 0;

			if ($filas != 0) {
				
				while ($linea = mysql_fetch_array($res)) {

	?>

					<div align="center">
						<center>
							<img src="./img/<?php echo $linea['imagen'];?>"> <br>
							<span> <b> Nombre: </b> <?php echo $linea['nombre'];?></span> <br>						
							<span> <b> Precio: </b> <?php echo $linea['precio'];?> €</span> <br>
							<span> <b> Cantidad: 

								<form name="formCantidad" method="post" action="validar_compra.php">
								<input type="hidden" name="campo_cod_producto" value="<?php echo $linea['cod_producto']?>">
								</b> <select name="listaCantidad">
				<?php

								$cantidad = $linea['cantidad'];
								for ($i=1; $i <= $cantidad; $i++) { 

	?>
						
								<option> <?php echo "$i";?> </option><br>
								

				<?php
									
								}	

				?>				
								</select> </span> <br>

				<?php
								if (isset($_SESSION['usuario'])) {

									echo "<input type='submit' value='Añadir al carrito'>";
									
								} else {


									echo "Tienes que iniciar sesion para poder comprar";
								}
								
				?>
								</form>
								<span> </span>
							
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

