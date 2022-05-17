<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "DELETE FROM tarjeta WHERE numTarjeta = '$numTarjeta'";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: mostrar_tarjetas.php");
?>	