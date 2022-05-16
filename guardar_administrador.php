<?php
	include('conexion.php');

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$validacion = "SELECT * FROM usuario WHERE documento = '$documento' OR email = '$email'";
	$resultado = mysqli_query($enlace, $validacion);

	if (mysqli_num_rows($resultado) == 1){
			header("Location: menu_root.php?recibido=1");
	}else{
		$consulta = "INSERT INTO usuario(nombre, apellido, documento, celular, id_genero, pais, estado, ciudad, email, pass, id_rol) 
		VALUES ('$nombre', '$apellido', '$documento', '$celular', '$id_genero', '$pais', '$estado', '$ciudad', '$email', '$pass', '2')";

		mysqli_query($enlace, $consulta);
		header("Location: menu_root.php?recibido=2");
	}
	mysqli_close($enlace);
?>	

