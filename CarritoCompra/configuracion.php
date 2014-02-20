<?php

	session_start();
	//CONSTANTES PARA EL ACCESO A LA BD
	DEFINE("DB_HOST", "localhost");
	DEFINE("DB_USER", "root");
	DEFINE("DB_PASSWORD", "");
	DEFINE("DB_NAME", "carrito_compra");


	function cabecera_html(){



		if (isset($_SESSION['usuario'])) {
			
		echo "<html> \n";
		echo "<head> \n";	
		echo "<style type=\"text/css\">";
	    echo "th{background-color:#9999FF;color:#FFFFFF};";
	    echo "td{color:#0000CC};";
	    echo "titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700};";
	    echo "</style>";
	    echo "<p align=\"right\"> Usuario: " . $_SESSION['usuario'] . "</p>";
	    echo "<p align='right'> <a href='cerrar_sesion.php' align='right'> Cerrar sesion </a> </p>";
	    echo "<p align='right'>";



		} else {

		//$_SESSION['usuario'] = "";
		echo "<form action=\"./iniciar_sesion.php\" method=\"post\">";
		echo "<p align=\"right\"> Nombre de Usuario: " . "<input type=\"text\" name=\"campoNombre\" id=\"campoNombre\" required>";
	    echo "<p align=\"right\"> Password: " . "<input type=\"password\" name=\"campoPassword\" id=\"campoPassword\" required> <br>";
	    echo "<br>";
	    echo "<input type=\"submit\" value=\"Iniciar sesion\">";
	    echo "</form>";
		echo "<p align=\"right\"> <a href=\"alta_usuario.php\"> Registrarse </a> </p>";

		}






	}


	function cabecera_html_carrito($usuario){

		




	    echo "<br>";	    
	    echo "<br>";	    
	    echo "</head> \n";
	    echo "<body> \n";


	}




	//METODO QUE SERVIRIA PARA CERRAR LA SESION Y CAMBIAR LA CABECERA A LA BASICA, DESTRUYENDO LA VARIABLE DE SESION
	function cerrar_sesion($usuario){

		$_SESSION['usuario'] = $usuario;
		unset($_SESSION['usuario']);
		//header("location:principal.php");
		cabecera_html();
	}


?>