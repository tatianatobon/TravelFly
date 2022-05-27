<?php
    include('conexion.php');
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 3){
            header("Location: menu_usuario.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>foro</title>

	<!-- Required meta tags -->
	    	
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <!-- Data Table -->
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	    <!-- Icons -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body style="background-color:#F4F6F6;">
	 <div>
        <nav class="navbar navbar-inverse navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"></a>
                </div>
                <div class="navbar-nav mr-auto">
                    <a href="menu_usuario.php" style="color: #FFFFFF;">volver <i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>   
        </nav>
    </div>

    <div>
    	<p style="text-align:center;"  > <h1 style="text-align:left; margin-left: 10%; width: 22%;">FORO GENERAL</h1><img src="img/Foro.jpeg" alt="" width=150" height="60" style="position: absolute;top:  12.5%;left: 42%;" class="rounded img-fluid d-inline-block align-text-top">
    	</p>
    </div>
    <div style="width: 80%;margin:auto ;margin-top: 80px;">


        <?php
          $user = "SELECT * FROM usuario WHERE id_usuario= ".$_SESSION['id_usuario'];
          $resul = mysqli_query($enlace, $user);
          $usuario = mysqli_fetch_array($resul)
        ?>

        <?php
          $consulta = "SELECT * FROM foro WHERE user=1";
        ?>

        <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; margin-bottom: 5px; padding:10px;">
             <form onsubmit="return valida_envia()" action="almacenarMensaje.php" method="post" enctype="multipart/form-data"name="fvalida">
                <input type="text" name="mensaje" placeholder="       Realiza tu pregunta" class="form" style="width:90%; font-size: 18px; margin:auto;" >
                <input type="hidden" name="user" value="<?php echo $usuario['user']  ?>">
                <input type="submit" style="margin:auto;text-align:center; border-color:#F4F6F6; color: #3498DB;" >
            </form>
        </div>


        <?php
          $user=$usuario['user']; $consulta = "SELECT * FROM foro WHERE user='$user'"; 
        ?>

            
            <?php if($resultado = mysqli_query($enlace, $consulta)){ ?>
                <?php$resultado= mysqli_data_seeK($resultado,0); ?>
                <?php while ($i = mysqli_fetch_assoc($resultado)) { ?>

                    <div style="border: solid; border-radius: 10px; border-color: #85929E;margin: auto; margin-bottom: 5px; padding: 10px;">
                        <h6> 
                            <?php echo "De: ".$i["user"]?> 
                        </h6>
                        <p> <?php echo $i["mensaje"] ?> <br> </p>

                            <h6>Respuesta <br></h6>
                            <p><?php echo$i['respuestaAdministrador']?></p>
                        <form onsubmit="return valida_envia()" action="eliminarMensaje.php" method="post" enctype="multipart/form-data"name="fvalida">
                            <input type="hidden" name="id_mensaje" value="<?php echo $i['id_mensaje']  ?>">
                            <input type="submit" style="margin:auto;text-align:center; border-color:#F4F6F6; color: #3498DB;" value="Eliminar" >
                        </form>             

                    </div>
                    
                <?php }  ?>

            <?php }  ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>