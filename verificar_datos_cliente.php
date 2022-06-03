<?php
	require 'conexion.php';
	session_start();

	$codVuelo=$_POST['codVuelo'];

	$consulta="SELECT * FROM vuelo WHERE codVuelo='$codVuelo'";
	$ejecutar=mysqli_query($enlace, $consulta);
	$row=mysqli_fetch_array($ejecutar);

    if($row>0){
        $id_vuelo = $row[0];

        $_SESSION['id_vuelo'] = $id_vuelo;

		header("Location: opciones_vuelo.php");
			
	}else{
		echo '<script language="javascript">alert("Datos Erroneos");
			window.location.href="administrar_vuelo_usuario.php"</script>';
	}
	
?>	

