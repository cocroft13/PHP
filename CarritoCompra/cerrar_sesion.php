<?php


	include("configuracion.php");

		unset($_SESSION['usuario']);
		unset($_SESSION['carrito']);
		unset($_SESSION['total']);
		header("location:principal.php");
	

?>