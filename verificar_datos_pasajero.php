<?php
	require 'conexion.php';
	session_start();

	$codVuelo=$_POST['codVuelo'];
	$email=$_POST['email'];

	$consulta="SELECT tiquete.id_tiquete, viajero.id_viajero, vuelo.id_vuelo, usuario.email, vuelo.codVuelo FROM tiquete 
    INNER JOIN viajero ON tiquete.id_viajero = viajero.id_viajero INNER JOIN vuelo ON tiquete.id_vuelo = vuelo.id_vuelo WHERE email='$email' AND codVuelo='$codVuelo'";
	$ejecutar=mysqli_query($enlace, $consulta);
	$row=mysqli_fetch_array($ejecutar);

    if($row>0){
        $id_viajero = $row[0]; 
        $id_vuelo = $row[0];
        $id_tiquete = $row[0];

		$_SESSION['id_viajero'] = $id_viajero;
        $_SESSION['id_vuelo'] = $id_vuelo;
        $_SESSION['id_tiquete'] = $id_tiquete;

		header("Location: ");
			
	}else{
		echo '<script language="javascript">alert("Datos Erroneos");
			window.location.href="administrar_vuelo_pasajero.html"</script>';
	}
	
?>	

