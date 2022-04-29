<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$validacion = "SELECT * FROM usuario WHERE documento = '$documento' OR email = '$email'";
	$resultado = mysqli_query($enlace, $validacion);

	if (mysqli_num_rows($resultado) == 1){
			header("Location: crearCuenta.php?recibido=1");
	}else{
		$consulta = "INSERT INTO usuario(nombre, apellido, documento, celular, fechaNacimiento, id_genero, pais, estado, ciudad,
		direccion, email, user, pass, confirmPass, foto, id_rol) VALUES ('$nombre', '$apellido', '$documento', '$celular', '$fechaNacimiento', 
		'$id_genero', '$pais', '$estado', '$ciudad', '$direccion', '$email', '$user', '$pass', '$confirmPass', '$foto', '3')";

		mysqli_query($enlace, $consulta);
		header("Location: inicio.html");
	}
	mysqli_close($enlace);
?>	