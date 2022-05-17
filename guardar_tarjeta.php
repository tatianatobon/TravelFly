<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

    $validacion = "SELECT * FROM tarjeta WHERE numTarjeta = '$numTarjeta'";
	$resultado = mysqli_query($enlace, $validacion);

    if (mysqli_num_rows($resultado) == 1){
        header("Location: mostrar_tarjetas.php?recibido=1");
    }else{
        $consulta = "INSERT INTO tarjeta(id_tipo_tarjeta, numTarjeta, nombre_propietario, fecha_vencimiento, cvv, saldo_actual, id_usuario) 
        VALUES ('$id_tipo_tarjeta', '$numTarjeta', '$nombre_propietario', '$fecha_vencimiento', '$cvv', '15000000', '$id_usuario')";
	    mysqli_query($enlace, $consulta);
        header("Location: mostrar_tarjetas.php?recibido=2");
    }
    mysqli_close($enlace);
?>	