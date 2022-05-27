<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
		$$var=$val;
	}

	$consulta = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', celular='$celular', id_genero='$id_genero', direccion='$direccion', email='$email', user='$user', pass='$pass', confirmPass='$confirmPass' WHERE id_usuario = '$id_usuario'"; 

	$resultado = mysqli_query($enlace, $consulta);
	
	if ($resultado){
			header("Location: menu_administrador.php?recibido=3");
	}else{
		header("Location: menu_administrador.php?recibido=4");
	}
	mysqli_close($enlace);
?>	