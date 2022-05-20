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
    $recibido=0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Menu Administrador</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/fonts.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/estilo2.css" rel="stylesheet">
  
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body id="page-top">
    <?php
      $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2'";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado);
    ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - imagen -->
      <center>
        <a class="navbar-brand" href="menu_usuario.php"><img src="img/Logotipo.png" alt="" width="65" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
      </center>
      <hr class="sidebar-divider my-0">
      <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="editar_datos_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" ><i class="bi bi-gear-fill"></i><span>Editar Datos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrar_tarjetas.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-credit-card-fill"></i><span>Agregar Tarjeta</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-envelope-check-fill"></i><span>Noticias</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-clipboard2-check-fill"></i></i><span>Check-in</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-cart-check-fill"></i><span>Mis Vuelos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-plane"></i><span>Compra tu Tiquete</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipo de Vuelo:</h6>
              <a class="collapse-item" href="mostrar_vuelos_nacionales.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Nacional</a>
              <a class="collapse-item" href="mostrar_vuelos_internacionales_ida.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Colombia --> Internacional</a>
              <a class="collapse-item" href="mostrar_vuelos_internacionales_regreso.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Internacional --> Colombia</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-chat-square-text-fill"></i><span>Foro</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="eliminar_cuenta.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-person-dash-fill"></i><span>Eliminar Cuenta</span></a>
      </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div>
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <ul class="navbar-nav ml-auto">
              <div class="navbar-nav mr-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir">Cerrar Sesión <i class="bi bi-box-arrow-right"></i></button>
                <!-- Modal Salir-->
                <div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content">
                      <div class="modal-header bg-primary" >
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Advertencia!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                      </div>
                    <div class="modal-body">
                      <center><h4>¿Está seguro de salir?</h4></center>
                    </div>
                    <div class="modal-footer">
                      <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button></a>
                      <a href="listar_vuelo_nacional.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </nav>
        </div>
        <b>
        <center>
            <font face="Times New Roman" size="8" color="Black">Módulo de gestión financiera</font>
        </center>
        <!-- DataTable -->
        </b>
        <?php  
          foreach ($_REQUEST as $var => $val) {
          $$var=$val; 
                    
          }if($recibido == 1){?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Advertencia!</strong> La Tarjeta que Intento Ingresar ya se encuentra Registrada. Vuelva a Intentar.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php }else if($recibido == 2){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Exito!</strong> Los Datos de su Tarjeta fueron Ingresados Corectamente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php }?>
        <div class="container-fluid">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <div class="text-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCrearTarjeta<?php echo $_SESSION['id_usuario']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table id="tablaAdmi" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th><center>Tipo de tarjeta</center></th>
                  <th><center>Numero de Tarjeta</center></th>
                  <th><center>fecha_vencimiento</center></th>
                  <th><center>CVV</center></th>
                  <th><center>Saldo Actual</center></th>
                  <th><center>Opciones</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta = "SELECT tipo_tarjeta.tipo_tarjeta, usuario.nombre, usuario.apellido, tarjeta.numTarjeta, tarjeta.fecha_vencimiento, tarjeta.cvv, tarjeta.saldo_actual FROM tarjeta
                INNER JOIN tipo_tarjeta ON tarjeta.id_tipo_tarjeta = tipo_tarjeta.id_tipo_tarjeta INNER JOIN usuario ON tarjeta.id_usuario = usuario.id_usuario 
                WHERE usuario.id_usuario  = $_SESSION[id_usuario];";
                $resultado = mysqli_query($enlace, $consulta);

                while($fila = mysqli_fetch_array($resultado)){?>

                  <tr>
                    <td><center><?php echo $fila['tipo_tarjeta'];?></center></td>
                    <td><center><?php echo $fila['numTarjeta'];?></center></td>
                    <td><center><?php echo $fila['fecha_vencimiento'];?></center></td>
                    <td><center><?php echo $fila['cvv'];?></center></td>
                    <td><center><?php echo $fila['saldo_actual'];?></center></td>
                    <td><center>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarTarjeta<?php echo $fila['numTarjeta']; ?>"><i class="bi bi-trash-fill"></i>
                    </button><center></td>
                  </tr>
                  <!-- Modales Tarjetas -->
                  <?php include('modales_tarjetas.php'); ?>
                <?php  } 
                  mysqli_close($enlace);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Funciones DataTable -->
  <script type="text/javascript">
        $(document).ready(function(){
            $('#tablaAdmi').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "sProcessing": "Procesando...",
                    "zeroRecords": "No se han encontrado resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "oPaginate": {
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                }
            });
        });
    </script>
</body>

</html>