<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$consulta = "INSERT INTO tarjeta(id_tipo_tarjeta, numTarjeta, nombre_propietario, fecha_vencimiento, cvv, id_usuario) 
        VALUES ('$id_tipo_tarjeta', '$numTarjeta', '$nombre_propietario', '$fecha_vencimiento', '$cvv', '$id_usuario')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: agregar_tarjeta.php");
?>	