
<?php

	function mostrar_formulario(){
		//EL CODIGO HTML SOLO SE INSERTA EN LA PAGINA SI SE EJECTUTA ESTA FUNCION

		global $errores_formulario;
		global $id;
		global $nombre;
		global $apellido1;
		global $apellido2;
		global $direccion;
		global $codPostal;
		$idioma = $_SESSION['idioma'];
		
?>

	<h3> <center> <?=leer_texto("form_editar_visita","titulo1",$idioma)?> <br> </center> </h3>
	<form name="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">

		<input type="hidden" name="visita" value="<?=$id?>">
		<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
			<tr><td>
				<p align="center"> <b> <?=leer_texto("form_editar_visita","titulo2",$idioma)?> </b> </p>

				<?=leer_texto("general","nombre",$idioma)?>: <br>
				<input type="text" name="nombre" id="nombre" size="25" maxlength="25" value="<?=$nombre?>">
				<br>

				<?=leer_texto("general","apellido1",$idioma)?>: <br>
				<input type="text" name="ap1" id="ap1" size="25" maxlength="25" value="<?=$apellido1?>">
				<br>

				<?=leer_texto("general","apellido2",$idioma)?>: <br>
				<input type="text" name="ap2" id="ap2" size="25" maxlength="25" value="<?=$apellido2?>">
				<br>

				<?=leer_texto("general","direccion",$idioma)?>: <br>
				<input type="text" name="dir" id="dir" size="25" maxlength="25" value="<?=$direccion?>">
				<br>

				<?=leer_texto("general","codigo_postal",$idioma)?>: <br>
				<input type="text" name="cp" id="cp" size="25" maxlength="25" value="<?=$codPostal?>">
				<br>

	<center>

		<input name="borrar" type="reset" value="<?=leer_texto('general','borrar',$idioma)?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="editar" type="submit" value="<?=leer_texto('general','editar',$idioma)?>">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="cancelar" type="button" value="<?=leer_texto('general','cancelar',$idioma)?>" onclick="window.location.href = 'libro_visitas.php'">

	</center>
	</td></tr>
	</table>
	</form>
	<br>

	<?php

	}	//FIN DE LA FUNCION mostrar_formulario


	function validar_formulario(){
		//COMPROBAMOS LOS POSIBLES VALORES DEL FORMULARIO

			global $errores_formulario;
			global $id;
			global $nombre;
			global $apellido1;
			global $apellido2;
			global $direccion;
			global $codPostal;


			if (isset($_REQUEST["nombre"])) {
				$nombre = $_REQUEST["nombre"];
			}

			if (isset($_REQUEST["apellido1"])) {
				$nombre = $_REQUEST["apellido1"];
			}

			if (isset($_REQUEST["apellido2"])) {
				$nombre = $_REQUEST["apellido2"];
			}

			if (isset($_REQUEST["direccion"])) {
				$nombre = $_REQUEST["direccion"];
			}

			if (isset($_REQUEST["cp"])) {
				$nombre = $_REQUEST["cp"];
			}


			if ($nombre == "") {
				$errores_formulario[] = "El campo nombre es obligatorio";
			}

			if ($apellido1 == "") {
				$errores_formulario[] = "El campo apellido1 es obligatorio";
			}

			if ($apellido2 == "") {
				
				$errores_formulario[] = "El campo apellido2 es obligatorio";
			}

			if ($direccion == "") {
				$errores_formulario[] = "El campo direccion es obligatorio";
			}

			if ($codPostal == "") {
				$errores_formulario[] = "El campo codigo postal es obligatorio";
			}
	} //FIN DE LA FUNCION validar_formulario


	function mostrar_errores(){

		//MOSTRAMOS LOS ERRORES ENCONTRADOS EN EL FORMULARIO
		global $errores_formulario;
		foreach ($errores_formulario as $error) {
			
			echo "<center> <font color='red'> $error </font> </center> <br>";
		}

	} //FIN DE LA FUNCION mostrar_errores

	
	function leer_datos_entrada(){

		//RECUPERAMOS LA INFORMACION DE LA VISITA
		//SI VIENE DEL LIBRO DE VISITAS LEEMOS DE LA BD
		//SI SE HA ENVIADO EL FORMULARIO LEEMOS LAS VARIABLES $_REQUEST

		global $errores_formulario;
		global $id;
		global $nombre;
		global $apellido1;
		global $apellido2;
		global $direccion;
		global $codPostal;


		$id = $_REQUEST["visita"];

		if (isset($_REQUEST["libro_visitas"])) {
			
			//VENIMOS DEL LIBRO DE VISITAS
			//TRATAMOS DE CONECTAR CON LA BD

			$conexion = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			if (!$conexion || !mysql_select_db(DB_NAME,$conexion)) {
				

				$errores_formulario["conexion"] = "<center> <font color='red'> Error al consultar los datos de la visita: " . mysql_error() . "</font> </center> <br>";
			
			} else {

				//LANZAMOS LA CONSULTA A LA BD
				$sql = "SELECT * FROM usuarios WHERE id = $id;";
				$res = mysql_query($sql,$conexion);


				if (mysql_num_rows($res) != 1) {
					//HA HABIDO UN ERROR AL CONECTAR A LA BD
					$errores_formulario["conexion"] = "<center><font color='red'>Error al consultar los datos de la visita.</font></center><br>";
				
				} else {
					//INTRODUCIMOS LOS DATOS LEIDOS DE LA BD EN LAS VARIABLES PARA MOSTRAR EN EL FORMULARIO
					$linea = mysql_fetch_array($res);
					$nombre = $linea["nombre"];
					$apellido1 = $linea["apellido1"];
					$apellido2 = $linea["apellido2"];
					$direccion = $linea["direccion"];
					$codPostal = $linea["codigo_postal"];
				}
			}

		} else {

			//VENIMOS DE HABERSE ENVIADO EL FORMULARIO editar_visita
			//LEEMOS LOS DATOS DEL OBJETO $_REQUEST

			if (isset($_REQUEST["nombre"])) {
				$nombre = $_REQUEST["nombre"];
			}

			if (isset($_REQUEST["apellido1"])) {
				$nombre = $_REQUEST["apellido1"];
			}

			if (isset($_REQUEST["apellido2"])) {
				$nombre = $_REQUEST["apellido2"];
			}

			if (isset($_REQUEST["direccion"])) {
				$nombre = $_REQUEST["direccion"];
			}

			if (isset($_REQUEST["cp"])) {
				$nombre = $_REQUEST["cp"];
			}
		}
	} //FIN DE LA FUNCION leer_datos_entrada


	//VARIABLES GLOBALES
	include_once("./configuracion.php");
	$errores_formulario = array(); //VARIABLE GLOBAL PARA ALMACENAR LOS ERRORES
	$nombre = "";
	$apellido1 = "";
	$apellido2 = "";
	$direccion = "";
	$codPostal = "";

	//FIN DE DEFINICIONES DE LA PAGINA

	leer_datos_entrada();
	if (isset($_REQUEST["editar"])) {
		//SE HA ENVIADO EL FORMULARIO.LO VALIDAMOS Y SI ES CORRECTO SE ENVIA.

		validar_formulario(); //VALIDAMOS LOS VALORES ENVIADOS POR EL FORMULARIO
		if (count($errores_formulario == 0)) {
			//FORMULARIO SIN ERRORES, REDIRIGIMOS A LA PAGINA DE INSERTAR DATOS
			header("location:editar_visita.php?" . $_SERVER["QUERY_STRING"]);
			exit();
		}
	}

//MOSTRAMOS EL FORMULARIO
cabecera_html("Editar visita");
mostrar_formulario();

mostrar_errores();
pie_html();
?>