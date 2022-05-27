<?php
	require 'conexion.php';
	session_start();

	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$consulta="SELECT * FROM usuario WHERE email='$email' AND pass='$pass'";
	$ejecutar=mysqli_query($enlace, $consulta);
	$row=mysqli_fetch_array($ejecutar);

	if($row == true){

		$id_rol = $row[16];
		$id_usuario = $row[0];
		$_SESSION['id_rol'] = $id_rol;
		$_SESSION['id_usuario'] = $id_usuario;


		switch ($_SESSION['id_rol']){
			case 1:
				header("Location: menu_root.php");
				break;
			case 2:
				header("Location: menu_administrador.php");
				break;
			case 3:
				header("Location: menu_usuario.php");
				break;			
			default:
				break;
		}
	}else{
		echo '<script language="javascript">alert("Error de autentificacion");
		window.location.href="InicioSesion.html"</script>';
	}
?>	
