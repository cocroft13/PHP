<?php


?>

<html>
<head>
		<h2 align="center"> Alta de usuarios</h2>
<script type="text/javascript">

	function validar(){

		var nombre = document.getElementById("nombre").value;
		var passwd = document.getElementById("passwd").value;
		var correo = document.getElementById("correo").value;
		var pais = document.getElementById("pais").value;
		
		if (nombre == "" || passwd == "" || correo == "" || pais == "") {
		
			alert("Algun campo esta vacio");
			return false;

		} else {

			return true;
			
		}
	}

</script>

</head>


<body>

	<form action="validar_formulario.php" name="form1" method="get" onSubmit="return validar();">

	<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
		<tr><td>
	Nombre:<INPUT type="text" id="nombre" name="nombre" size="25"><BR>

	Password:<INPUT type="password" id="passwd" name="passwd" size="25"><BR>

	Correo:<INPUT type="text" id="correo" name="correo" size="25"><BR>

	Pais: <INPUT type="text" id="pais" name="pais" size="30"><BR>

	
	<INPUT type="submit" value="ENVIAR">
	<INPUT type="reset" value="BORRAR">

		</tr></td>
	</table>
</form>
</body>

</html>