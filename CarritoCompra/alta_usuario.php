<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<head>
		<h2 align="center"> Alta de usuarios</h2>
		<script type="text/javascript">

	function validar(){

		var nombre = document.getElementById("nombre").value;
		var passwd = document.getElementById("passwd").value;
		var correo = document.getElementById("correo").value;
		var pais = document.getElementsByName("listaPaises").options.selectedIndex;
		
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

	<form action="validar_formulario.php" name="form1" method="post" onSubmit="return validar();">

	<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
		<tr><td>
	Nombre:<INPUT type="text" id="nombre" name="nombre" size="25"><BR>
	<br>

	Password:<INPUT type="password" id="passwd" name="passwd" size="25"><BR>
	<br>

	Correo:<INPUT type="text" id="correo" name="correo" size="25"><BR>
	<br>

	Pais: <SELECT name="listaPaises"><BR>
			<option value="Spain"> Spain </option>
			<option value="Francia"> Francia </option>
			<option value="Inglaterra"> Inglaterra </option>
		</select>
		<br>
		<br>
	
	<INPUT type="submit" value="ENVIAR">
	<INPUT type="reset" value="BORRAR">

		</tr></td>
	</table>
</form>
</body>

</html>