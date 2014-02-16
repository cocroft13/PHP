<?php
include_once("./configuracion.php");
cabecera_html("Eliminar visita");
?>
	<table border="0" align="center" cellspacing="5">
		<tr><td class="titulo" align="center">
				ELIMINAR VISITAS
		</tr></td>
	<tr> <td>
<?php


	//recuperamos el campo id del formulario
	$id = $_REQUEST["visita"];


	if ($id == ""){

		echo "<h3 align=\"center\"> Error en el acceso al eliminar la visita. No se ha encontrado el identificador </h3>";

	} else {

		

		//CONECTAMOS CON LA BASE DE DATOS.
		$conexion = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if (!$conexion || !mysql_select_db(DB_NAME,$conexion) ) {
			
			echo "No se ha podido conectar con la base de datos";
			die("Error conectando a la BD; " . mysql_error());
		}

		//CREAMOS LA SENTENCIA DELETE PASANDOLE $ID como clave.
		$sql = "DELETE FROM usuarios "
				. "WHERE id = $id";

		//EJECUTAMOS LA SENTENCIA SQL

		$res = mysql_query($sql,$conexion);

		if (mysql_affected_rows($conexion)) {
			
			echo "<h3 align=\"center\"> Visita eliminada con exito </h3>";			

		} else {

			echo "<h3 align=\"center\"> No se ha encontrado ninguna visita con este identificador ($id). </h3>";
		}
	}
?>


	</td> </tr>
	</table>
<br>

<p align="right"> <a href="libro_visitas.php"> <?=leer_texto("general","volver_libro",$_SESSION['idioma'])?> </a> </p>

</body>
</html>