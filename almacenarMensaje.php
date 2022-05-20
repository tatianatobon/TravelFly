<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$consulta = "INSERT INTO foro (id_mensaje, user, mensaje, respuestaAdministrador) VALUES (NULL, '$user', '$mensaje', NULL)";
	mysqli_query($enlace, $consulta);
	header("Location: forousuario.php");
	mysqli_close($enlace);
?>	