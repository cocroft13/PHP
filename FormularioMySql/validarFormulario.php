<?php

	include_once("./configuracion.php");
	
	
?>


	<table border="0" align="center" cellspacing="5">
	<tr> <td class="titulo" align="center"> <?=leer_texto("insertar_visita","titulo1",$_SESSION['idioma'])?></td></tr>

	<tr><td>

<?php

	$errores_formulario = array();
	$flag = true;


	function mostrarErrores(){

		global $errores_formulario;
		foreach ($errores_formulario as $error) {
			
			echo "<center><font color='red'> $error </font> </center> <br>";
		}
	}


		if ($_REQUEST["nombre"] == ""){
			$errores_formulario[] = "El campo Nombre es obligatorio";
			$flag = false;
		
		} else {

			$nombre = $_REQUEST["nombre"];
		}

		if ($_REQUEST["ap1"] == "") {
			$errores_formulario = "El campo apellido1 es obligatorio";
			$flag = false;

		} else {

			$apellido1 = $_REQUEST["ap1"];
		}

		if ($_REQUEST["ap2"] == "") {
			$errores_formulario = "El campo apellido2 es obligatorio";
			$flag = false;

		} else {

			$apellido2 = $_REQUEST["ap2"];
		}

		if ($_REQUEST["dir"] == "") {
			$errores_formulario = "El campo direccion es obligatorio";
			$flag = false;
		
		} else {

			$direccion = $_REQUEST["dir"];
		}

		if ($_REQUEST["cp"] == "") {
			$errores_formulario = "El campo codigo postal es obligatorio";
			$flag = false;

		} else {

			$codPostal = $_REQUEST["cp"];			
		}
		


		if ($flag == false) 		
			header("location:Principal.html?form1=Principal.html");
		 

		include("configuracion.php");

		$conexion = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if (!$conexion || !mysql_select_db("curso_php",$conexion)) {

			echo "No se ha podido conectar a la BD";
			die("Error conectando a la BD; " . mysql_error());
		}

		$sql = "INSERT INTO usuarios"
			. "(nombre,apellido1,apellido2,direccion,codigo_postal)"
			. "VALUES "
			. "('$nombre','$apellido1','$apellido2','$direccion','$codPostal')";

			//Lanzamos la sentencia sql de insercion en la BD
			$res = mysql_query($sql,$conexion);


			if (mysql_affected_rows($conexion)) {
				
				header("location:libro_visitas.php?form1=Principal.html");

			} else {

				echo "No se ha insertado ninguna fila";
			}

?>

	</td></tr>
</table>
<br>
<p align="right"> <a href="libro_visitas.php"><?=leer_texto("general","volver_libro",$_SESSION['idioma'])?></a> </p>

<?php
pie_html();
?>



