<?php

	//CONSTANTES PARA EL ACCESO A LA BD
	DEFINE("DB_HOST", "localhost");
	DEFINE("DB_USER", "root");
	DEFINE("DB_PASSWORD", "");
	DEFINE("DB_NAME", "carrito_compra");


	session_start();
	if (!isset($_SESSION['usuario'])) {
		
		$_SESSION['usuario'] = "";
	}

	function cabecera_html(){

		echo "<html> \n";
		echo "<head> \n";
		echo "<title></title> \n";
		echo "<style type=\"text/css\">";
	    echo "th{background-color:#9999FF;color:#FFFFFF};";
	    echo "td{color:#0000CC};";
	    echo "titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700};";
	    echo "</style>";
	    echo "<p align=\"right\"> Nombre de Usuario: " . "<input type=\"text\" name=\"campoNombre\" id=\"campoNombre\">";
	    echo "<p align=\"right\"> Password: " . "<input type=\"password\" name=\"campoPassword\" id=\"campoPassword\"> <br>";
	    echo "<br>";
	    echo "<input type=\"button\" id=\"botonLogin\" value=\"Iniciar sesion\"> <br>";
	    echo "<br>";
	    echo "<a href=\"alta_usuario.php\" align=\"right\"> Registrarse </a>";
	    echo "</head> \n";
	    echo "<body> \n";

	}


	function cabecera_html_carrito($usuario){

		echo "<html> \n";
		echo "<head> \n";
		
		echo "<style type=\"text/css\">";
	    echo "th{background-color:#9999FF;color:#FFFFFF};";
	    echo "td{color:#0000CC};";
	    echo "titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700};";
	    echo "</style>";
	    echo "<p align=\"right\"> Usuario: " . "$usuario" . "</p>";
	    echo "<p align=\"right\"> <a href=\"paginaCarrito\"> Ir al carrito: " . "</a></p>";	  
	    echo "<br>";	    
	    echo "<br>";	    
	    echo "</head> \n";
	    echo "<body> \n";


	}

	function cerrar_sesion($usuario){

		$_SESSION['usuario'] = $usuario;
		unset($_SESSION['usuario']);
		header("location:principal.php?nombre=''");

	}


?>