<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "DELETE FROM vuelo WHERE id_vuelo = '$id_vuelo'";
	$resultado = mysqli_query($enlace, $consulta);

    mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_internacionalida.php");
?>	
