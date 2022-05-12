<?php

    include('conexion.php');

    foreach ($_REQUEST as $var => $val) {
    $$var=$val;
    }

	$nom_archivo = $_FILES["foto_vuelo"]["name"];
	$ruta = "img/".$nom_archivo;
	$archivo = $_FILES["foto_vuelo"]["tmp_name"];
	$subir = move_uploaded_file($archivo, $ruta);

	$consulta = "INSERT INTO vuelo(id_tipo_vuelo, fecha_hora_salida, id_nacional_origen, id_nacional_destino, costo_vuelo, foto_vuelo, id_estado, id_cant_horas) 
		VALUES ('1', '$fecha_hora_salida', '$id_nacional_origen', '$id_nacional_destino', '$costo_vuelo', '$foto_vuelo', '1', '$id_cant_horas')";
	mysqli_query($enlace, $consulta);
	mysqli_close($enlace);
	header("Location: listar_vuelo_nacional.php");
?>	