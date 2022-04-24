<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($enlace, $consulta);

	if ($resultado){
			header("Location: menu_root.php?recibido=5");
	}else{
		header("Location: menu_root.php?recibido=6");
	}
	mysqli_close($enlace);
?>	