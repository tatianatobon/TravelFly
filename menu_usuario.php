<?php

    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 3){
            header("Location: menu_usuario.php");
        }
    }
?>
<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TravelFly</title>
    <link rel="stylesheet" type="text/css" href="css/estilos1.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

	
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <p class="navbar-brand" >
        <img src="img/Logotipo.png" alt="" width="30" height="24">
      </p>
      <p class="navbar-brand">
        TravelFly Colombia
      </p>

      <div  class="container-fluid" style="text-align:right; margin: auto; ">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="float: right ">

        <li class="nav-item">
          <p style="text-align : right;"><a class="nav-link active" href="#">Historial De Compras</a></p>
        </li>
        <li class="nav-item">
          <p style="text-align : right;"><a class="nav-link active" aria-current="page" href="#" >Check In</a> </p>
        </li>        <li class="nav-item">
          <p style="text-align : right;" ><a class="nav-link active" aria-current="page" href="#">Noticias</a></p>
        </li>

        <li class="nav-item">
          <div class="container" style="align : right;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir"    >
              Cerrar Sesion
            </button>
          </div>
        </li>
<!-- Modal Salir-->
<div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
      <div class="modal-content ">
          <div class="modal-header bg-primary" >
              <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Advertencia!!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
          </div>
          <div class="modal-body">
              <center>
                  <h4>??Est?? seguro de salir?</h4>  
              </center>
          </div>
          <div class="modal-footer">
              <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button>
              </a>
              <a href="index.html"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
              </a>
          </div>
      </div>
  </div>
</div>


      </ul>
      </div>
         </div>
  </div>

</nav>

        <div style="position: relative; left: 50; top: 50;">
            <img src="https://www.hotelalmirantecartagena.com.co/blog-almirante/wp-content/uploads/sites/6/2021/12/blog-playa-banner2.jpg" class='eye'/>
            <img src="https://bitly.hk/OCZ3z" class="eye2"/>
            <img src="https://www.cjr.org/wp-content/uploads/2018/06/panorama-2117310_1920-1300x500.jpg" class="eye3"/>
        </div>
        
        <div 
            <h1></h1>
        <h5 class="contenedor" style="text-align: center; border: 1px solid rgb(7, 7, 7);">Cartagena</h5>
            </div>

        <div>
            <h5 class="contenedor1" style="text-align: center; border: 1px solid rgb(7, 7, 7); ">Madrid</h5>
        </div>

        <div>
            <h5 class="contenedor2" style="text-align: center ;border: 1px solid rgb(7, 7, 7);">Miami</h5>
        </div>
        <div>
            <h5 class="contenedorReserva" style="text-align: center ;border: 2px solid rgb(7, 7, 7);background-color:rgb(202, 198, 198)">Reseravar vuelo</h5>
        </div>

        <div class="contenedorReservas" style="text-align: width= 500px height= 500px; ; border: 1px solid rgb(7, 7, 7); background-color:rgb(240, 232, 232)">
          <input type="radio" name="transporte2" value="1">Ida y vuelta
  
          <input type="radio" name="transporte2" value="2" checked>Solo ida

        </div>
          
        
        <div>
            <h5 class="contenedorReserva2" style="text-align: center ;border: 2px solid rgb(7, 7, 7);background-color:rgb(202, 198, 198)">Gestionar tu reserva</h5>
        </div>
        <div>
            <h5 class="contenedorReserva3" style="text-align: center ;border: 2px solid rgb(7, 7, 7);background-color:rgb(202, 198, 198)">Check-in</h5>
        </div>
        <div>
            <h5 class="contenedorReserva4" style="text-align: center ;border: 2px solid rgb(7, 7, 7);background-color:rgb(202, 198, 198)">Estado del vuelo</h5>
        </div>
        
        

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>