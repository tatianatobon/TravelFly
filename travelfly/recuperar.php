<?php
    include('conexion.php');
    $correo = $_POST['correo'];

	

	foreach ($_REQUEST as $var => $val) {
	$$var=$val;
	}
	
	$consulta = "SELECT * FROM `usuario` WHERE `email` = '$correo'";

	$usuario = mysqli_query($enlace, $consulta);
    $cor = mysqli_num_rows($usuario);
	mysqli_close($enlace);
    if ($cor == 1){
        $mostrar = mysqli_fetch_array($usuario);
        $enviarpass = $mostrar['pass'];

        $paracorreo = $correo;
        $titulo = "Recuperar Contraseña";
        $mensaje = "Tu contraseña es: ".$enviarpass;
        $tucorreo = "From: travelfly.server@gmail.com";

        if(mail($paracorreo, $titulo, $mensaje, $tucorreo)){
            echo "<script> alert('Contraseña enviada'); window.location= 'index.html' </script>";
        }else{
            echo "<script> alert('Error'); window.location= 'index.html' </script>";
        }
    }else{
        echo "<script> alert('Este correo no existe'); window.location= 'index.html' </script>";
    }
?>	
