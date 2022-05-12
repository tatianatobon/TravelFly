<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$consulta = "INSERT INTO vuelo(id_tipo_vuelo, fecha_hora_salida, id_ciudad_origen, id_ciudad_destino, costo_vuelo, foto_vuelo, id_estado, id_cant_horas) 
		VALUES ('2', '$fecha_hora_salida', '$id_ciudad_origen', '$id_ciudad_destino', '$costo_vuelo', '$foto_vuelo', '1', '$id_cant_horas')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_internacionalida.php");
?>	