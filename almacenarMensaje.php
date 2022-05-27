<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$consulta = "INSERT INTO foro (user, mensaje, respuestaAdministrador) VALUES ('$user', '$mensaje', NULL)";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: forousuario.php");
	
?>	