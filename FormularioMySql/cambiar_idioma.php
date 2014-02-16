<?php
	
	include_once("./configuracion.php");

	function mostrar_formulario(){

		$idioma = $_SESSION["idioma"];
		$espanyol = "";
		$ingles = "";

		//Segun el idioma actual elegimos la opcion del select
		if ($idioma == "ES") {
				
			$espanyol = "selected";

		} else {

			$ingles = "selected";
		}
?>

	<table border="0" align="center" cellspacing="5">

		<tr>
			<td class ="titulo" align="center"><?=leer_texto("formulario_idioma","titulo1",$idioma)?> </td>
		</tr>
		<tr>
			<form name="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
				<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
					<tr>
						<td>
						<br>
						<?=leer_texto("general","idioma",$idioma)?>

						<select name="idioma">:

							<option value="ES" <?=$espanyol?> > <?=leer_texto("general","espanyol",$idioma)?> </option>
							<option value="IN" <?=$ingles?> > <?=leer_texto("general","ingles",$idioma)?> </option>
						</select>


						<div align="center">
							<br>
							<input name="Enviar" type="submit" value="<?=leer_texto("general","enviar",$idioma)?>">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input name="cancelar" type="button" value="<?=leer_texto("general", "cancelar", $idioma)?>" onclick="window.location.href = 'libro_visitas.php'">
							
            </div>

						</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>


<?php
}

if (isset($_REQUEST["idioma"])) {
	$idioma = $_REQUEST["idioma"];
	$_SESSION["idioma"] = $_REQUEST["idioma"];
	header("location:libro_visitas.php");
	exit();
}

cabecera_html("Cambiar idioma");
mostrar_formulario();
pie_html();


?>




