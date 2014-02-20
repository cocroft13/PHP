<?php


	include("configuracion.php");

		unset($_SESSION['usuario']);
		unset($_SESSION['carrito']);
		header("location:principal.php");
	

?>