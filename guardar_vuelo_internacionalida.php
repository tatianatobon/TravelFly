<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$nom_imagen = $_FILES['foto_vuelo']['name'];
	$ruta = "img/".$nom_imagen;
	$archivo = $_FILES['foto_vuelo']['file'];
	$subir = move_uploaded_file($archivo, $ruta);

	$consulta = "INSERT INTO vuelo(id_tipo_vuelo, fecha_hora_salida, id_ciudad_origen, id_ciudad_destino, costo_vuelo, foto_vuelo, id_estado, id_cant_horas) 
		VALUES ('2', '$fecha_hora_salida', '$id_ciudad_origen', '$id_ciudad_destino', '$costo_vuelo', '$nom_imagen', '1', '$id_cant_horas')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_internacionalida.php");
?>	