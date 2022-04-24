<?php

    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 1){
            header("Location: listar_Administrador.php");
        }
    }
?>
<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
	    <title>Lista de vuelos</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
    </head>

    <body>
    <div>
            <nav class="navbar navbar-light" style="background-color: #00CAFC;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="Logotipo.png" style="text-align: left"  width="55" height="55" class="rounded img-fluid d-inline-block align-text-top"></a>
                    </div>
                    <div class="navbar-nav mr-auto">
                        <a href="indexCuenta.html"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesion </a>
                    </div>
                </div>   
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <br>
                            <b>
                                <center>
                                    <font face="Times New Roman" size="9" color="Black">Lista de vuelos</font>
                                </center>
                            </b>
    
                        <br>
                        <table id="example" class="table table-bordered order-table" style="width:100%">
                            <thead>
                                <p>
                                    <a href=" " class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></a>
                                    <br><br>
                                </p>
                                <tr>
                                    <th><center>Nombre Completo</center></th>
                                    <th><center>Usuario</center></th>
                                    <th><center>Documento</center></th>
                                    <th><center>Correo</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Genero</center></th>
                                    <th><center>Opciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td><center></center></td>
                                    <td>
                                        <center>
                                            <a href=" " type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></a>
                                            <a href=" " type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a>	
                                        </center>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    </body>
</html>

