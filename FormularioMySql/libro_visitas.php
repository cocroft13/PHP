<?php

	include_once("./configuracion.php");
	cabecera_html("Libro de visitas");
	$idioma = $_SESSION["idioma"];
?>

<body>
	<table border="0" align="center" cellspacing="5" height="80%">
		<tr><td class="titulo" align="center"> <?leer_texto("libro_visitas","titulo1",$idioma)?></td></tr>
		<tr><td valign="top">
		<?php

		$con = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if (!$con || !mysql_select_db(DB_NAME,$con)) {
				
			echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error: \" " . mysql_error() . "\"</h3>";
		} else {

			if (isset($_REQUEST['pagina'])) {
				$pagina = $_REQUEST['pagina'];			
			} else 
				$pagina = 1; //La pagina por defecto es la 1.

			$num_max = $pagina * VISITAS_PAGINA; //ULTIMA VISITA A MOSTRAR
			$num_min = $num_max - VISITAS_PAGINA; //PRIMERA VISITA A MOSTRAR
			
		
			//Consultamos los datos de la BD
			$sql = "SELECT * FROM usuarios";
			$res = mysql_query($sql);
			$filas = mysql_num_rows($res);

			//Consultamos LIMITANDO los valores a los que vamos a mostrar en la pagina

			$sql = "SELECT * FROM usuarios LIMIT " . $num_min . ", " . VISITAS_PAGINA;
			$res = mysql_query($sql);

			if ($filas != 0) {
				
				while ($linea = mysql_fetch_array($res)) {
					echo "<table border=\"1\"";
					echo "bgcolor=\"gray\" cellpadding=\"5\" cellspacing=\"3\">";
					echo "<tr><th>" . leer_texto("general", "nombre",$idioma) . "</th><td>{$linea['nombre']} </td> \n";
					echo "<tr><th>" . leer_texto("general", "apellido1",$idioma) . "</th><td>{$linea['apellido1']} </td> \n";
					echo "<tr><th>" . leer_texto("general", "apellido2",$idioma) . "</th><td>{$linea['apellido2']} </td> \n";
					echo "<tr><th>" . leer_texto("general", "direccion", $idioma) . "</th><td>{$linea['direccion']}</td>\n";
					echo "<tr><th>" . leer_texto("general", "codigo_postal",$idioma) . "</th><td>{$linea['codigo_postal']}</td> \n";
					echo "<tr><th>" . leer_texto("general", "eliminar",$idioma) . "</th><td> <a href=\"eliminar_visita.php?visita={$linea['id']}\">" . leer_texto("general","eliminar",$idioma) . "</a></td>\n";
					echo "<tr><th>" . leer_texto("general", "editar",$idioma) . "</th><td> <a href=\"formulario_editar.php?visita={$linea['id']}&libro_visitas=1\">" . leer_texto("general","editar",$idioma) . "</a></td>\n";
					echo "</table><br>\n";

				}

				echo "</td></tr></table><center><table width=\"40%\" border=\"0\"> <tr> <td width=\"50%\" align=\"right\"> \n";
				if ($pagina > 1) 					
					echo "<a href=\"libro_visitas.php?pagina=" . ($pagina-1) . "\">" . leer_texto("general","anterior",$idioma) . "</a>";
				
				echo "</td> \n";
				echo "<td width=\"50%\"> &nbsp; \n";
				
				if ($num_max < $filas) 					
					echo "<a href=\"libro_visitas.php?pagina=" . ($pagina+1) . "\">" . leer_texto("general","siguiente",$idioma) . "</a>";
			
				echo "</td> </tr> </table> </center>";

			} else {

				//La consulta no devuelve datos. Indicamos al usuario que no hay datos
				echo "<h2 align=\"center\"> El libro de visitas no tiene registros </h2>";
			} 
		}
		?>
		</td>
		</tr>
	</table>
	<br>
<p align="right"> <a href="Principal.html"> <?=leer_texto("libro_visitas","introducir_visita",$idioma)?> </a></p>

<?php
pie_html();
?>









