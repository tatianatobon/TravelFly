<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: inicio.html");
?>	