<?php

include_once("./configuracion.php");

?>

<table border="0" align="center" cellspacing="5">

	<tr>
		<td class="titulo" align="center"> <?=leer_texto("form_editar_visita","titulo1",$_SESSION['idioma'])?> </td>
	</tr>

	<tr>
		<td>

		<?php

			include("configuracion.php");
			$nombre = trim($_REQUEST["nombre"]);
			$apellido1 = trim($_REQUEST["ap1"]);
			$apellido2 = trim($_REQUEST["ap2"]);
			$direccion = trim($_REQUEST["dir"]);
			$codPostal = trim($_REQUEST["cp"]);
			$id = $_REQUEST["visita"];

			
			if (($nombre == "") or ($apellido1 == "") or ($apellido2 == "") or ($direccion == "") or ($codPostal == "") or ($id == "")) {
				
				echo "<h2 align=\"center\"> No se ha podido editar la visita, falta algun dato. </h3>";
			
			} else {

				$conexion = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

				if (!$conexion || @!mysql_select_db(DB_NAME,$conexion)) {

					echo "<h3 align=\"center\"> Error al conectar a la base de datos: " . mysql_error() . "</h3>";
				
				} else {

					//GENERAMOS LA SENTENCIA SQL
					$sql = "UPDATE usuarios SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 ='$apellido2', direccion = '$direccion',
							codigo_postal = '$codPostal' WHERE id = $id ";

					//LANZAMOS LA SENTENCIA DE INSERCION
					$res = mysql_query($sql,$conexion);
					if (mysql_affected_rows($conexion)) {
						
						echo "<h2 align=\"center\"> Visita editada con exito </h2>";						
					} else {

						echo "<h2 align=\"center\"> No se ha realizado ninguna modificacion </h2>";
					}
				}
			}
		?>

		</td>
	</tr>
</table>

<br>

<p align="right"> <a href="libro_visitas.php"> <?=leer_texto("general","volver_libro",$_SESSION['idioma'])?> </a> </p>

</body>
</html>