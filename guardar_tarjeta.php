<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$consulta = "INSERT INTO tarjeta(id_tipo_tarjeta, numTarjeta, nombre_propietario, fecha_vencimiento, cvv, saldo_actual, id_usuario) 
        VALUES ('$id_tipo_tarjeta', '$numTarjeta', '$nombre_propietario', '$fecha_vencimiento', '$cvv', '15000000', '$id_usuario')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: mostrar_tarjetas.php");
?>	