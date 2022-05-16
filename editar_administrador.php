<?php

	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}

	$nombre_imagen = $_FILES['foto']['name'];
	$ruta = "img/".$nombre_imagen;
	$archivo = $_FILES['foto']['file'];
	$subir = move_uploaded_file($archivo, $ruta);

	$consulta = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', celular='$celular', fechaNacimiento='$fechaNacimiento', direccion='$direccion', user='$user', pass='$pass', confirmPass='$confirmPass', foto='$nombre_imagen' WHERE id_usuario = '$id_usuario'"; 
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: editar_datos_admi.php");
?>	