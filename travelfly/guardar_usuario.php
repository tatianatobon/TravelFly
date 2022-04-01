<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$consulta = "INSERT INTO usuario(nombre, apellido, documento, celular, fechaNacimiento, id_genero, pais, estado, ciudad,
	direccion, email, user, pass, confirmPass, foto, id_rol) VALUES ('$nombre', '$apellido', '$documento', '$celular', '$fechaNacimiento', 
	'$id_genero', '$pais', '$estado', '$ciudad', '$direccion', '$email', '$user', '$pass', '$confirmPass', '$foto', '3')";

	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: index.html");
?>	