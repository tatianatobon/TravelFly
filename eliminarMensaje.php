<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "DELETE FROM foro WHERE id_mensaje = '$id_mensaje'";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: forousuario.php");
?>	