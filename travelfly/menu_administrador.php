<?php

    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 2){
            header("Location: menu_administrador.php");
        }
    }
?>
<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <title>Menu_Administradores</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    </head>

    <body>
        <div>
            <nav class="navbar navbar-light" style="background-color: #00CAFC;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="Logotipo.png" alt="" width="55" height="55" class="rounded img-fluid d-inline-block align-text-top"></a>
                    </div>
                    <div class="navbar-nav mr-auto">
                        <a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> Sign off</a>
                    </div>
                </div>   
            </nav>
        </div>
        <br>
        <br>
        <center>
            <font face="Times New Roman" size="9" color="Black">Bienvenido Administrador</font>
        </center>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    </body>
</html>

