<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$consulta = "UPDATE vuelo SET fecha_hora_salida = '$fecha_hora_salida' , costo_vuelo = '$costo_vuelo',  id_cant_horas = '$id_cant_horas' WHERE id_vuelo = '$id_vuelo'"; 
		
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_internacionalregreso.php");
?>	