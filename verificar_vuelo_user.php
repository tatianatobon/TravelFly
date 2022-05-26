<?php
	require 'conexion.php';
	session_start();

	$codVuelo=$_POST['codVuelo'];

	$consulta="SELECT tiquete.id_tiquete, viajero.id_viajero, vuelo.id_vuelo, usuario.email, vuelo.codVuelo FROM tiquete 
    INNER JOIN usuario ON tiquete.id_usuario = usuario.id_usuario INNER JOIN vuelo ON tiquete.id_vuelo = vuelo.id_vuelo WHERE codVuelo='$codVuelo'";
	$ejecutar=mysqli_query($enlace, $consulta);
	$row=mysqli_fetch_array($ejecutar);

    if($row>0){
        $id_usuario = $row[0]; 
        $id_vuelo = $row[0];
        $id_tiquete = $row[0];

		$_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['id_vuelo'] = $id_vuelo;
        $_SESSION['id_tiquete'] = $id_tiquete;

		header("Location: opciones_editar.php");
			
	}else{
		echo '<script language="javascript">alert("Datos Erroneos");
			window.location.href="administrar_vuelo_pasajero.html"</script>';
	}
	
?>	