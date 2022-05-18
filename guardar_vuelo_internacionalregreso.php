<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$nom_imagen = $_FILES['foto_vuelo']['name'];
	$ruta = "img/".$nom_imagen;
	$archivo = $_FILES['foto_vuelo']['file'];
	$subir = move_uploaded_file($archivo, $ruta);

	$consulta = "INSERT INTO vuelo(id_tipo_vuelo, codVuelo, id_aerolinea, fecha_hora_salida, id_ciudad_origen, id_ciudad_destino, costo_vuelo, foto_vuelo, estado, id_cant_horas, cant_sillas) 
		VALUES ('3', '$codVuelo', '$id_aerolinea', '$fecha_hora_salida', '$id_ciudad_origen', '$id_ciudad_destino', '$costo_vuelo', '$nom_imagen', 'Activo', '$id_cant_horas', '250')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_internacionalregreso.php");
?>	