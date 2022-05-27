<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
		$consulta = "UPDATE foro SET respuestaAdministrador = '$Respuesta' WHERE foro . id_mensaje ='$id_mensaje'";

		mysqli_query($enlace, $consulta);
		header("Location: foro2.php");
	
	mysqli_close($enlace);
?>	