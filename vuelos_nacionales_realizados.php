<?php
    include('conexion.php');
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 2){
            header("Location: menu_administrador.php");
        }
    }
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
    
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - imagen -->
      <center>
        <a class="navbar-brand" href="menu_administrador.php"><img src="img/Logotipo.png" alt="" width="65" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
      </center>
      <hr class="sidebar-divider my-0">
      <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="editar_datos_admi.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" ><i class="bi bi-gear-fill"></i><span>Editar Datos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="bi bi-send-fill"></i><span>Listar Vuelos</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipo de Vuelo:</h6>
              <a class="collapse-item" href="listar_vuelo_nacional.php">Nacional</a>
              <a class="collapse-item" href="listar_vuelo_internacionalida.php">Colombia --> Internacional</a>
              <a class="collapse-item" href="listar_vuelo_internacionalregreso.php">Internacional --> Colombia</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-chat-square-text-fill"></i><span>Foro</span></a>
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
                      <a href="vuelos_nacionales_realizados.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </ul>
          </nav>
        </div>
        <b>
        <center>
            <font face="Times New Roman" size="8" color="Black">Listado de Vuelos Nacionales</font>
        </center>
        <!-- DataTable -->
        </b>
        <div class="container-fluid">
        <div class="card-body">
          <div class="row">
            <div class="col-1">
              <div class="text-center">
                  <a class="btn btn-primary" href="listar_vuelo_nacional.php" role="button"><i class="bi bi-box-arrow-left"></i> Volver</a>
              </div>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table id="tablaAdmi" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><center>Codigo de Vuelo</center></th>
                  <th><center>Aerolinea</center></th>
                  <th><center>Ciudad Origen</center></th>
                  <th><center>Fecha y Hora de Salida</center></th>
                  <th><center>Ciudad Destino</center></th>
                  <th><center>Fecha y Hora de Llegada</center></th>
                  <th><center>Valor Vuelo Clase Economica</center></th>
                  <th><center>Valor Vuelo Primera Clase</center></th>
                  <th><center>Estado</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta = "SELECT vuelo.id_vuelo, vuelo.codVuelo, aerolineas.nombre_aerolinea, origen_nacional.ciudad_origen, vuelo.fecha_hora_salida, destino_nacional.ciudad_destino, vuelo.estado,
                DATE_ADD(vuelo.fecha_hora_salida, INTERVAL tiempo_vuelo.cantidad_horas HOUR) AS fecha_hora_llegada, vuelo.costo_vuelo, (vuelo.costo_vuelo + 80000) AS costo_primera_clase FROM vuelo 
                INNER JOIN origen_nacional ON vuelo.id_nacional_origen = origen_nacional.id_nacional_origen 
                INNER JOIN destino_nacional ON vuelo.id_nacional_destino = destino_nacional.id_nacional_destino 
                INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo
                INNER JOIN aerolineas ON vuelo.id_aerolinea = aerolineas.id_aerolinea
                INNER JOIN tiempo_vuelo ON vuelo.id_cant_horas = tiempo_vuelo.id_cant_horas WHERE tipo_vuelo.id_tipo_vuelo = '1' AND vuelo.estado = 'Realizado' ORDER BY id_vuelo;";
                $resultado = mysqli_query($enlace, $consulta);

                while($fila = mysqli_fetch_array($resultado)){?>
                  <tr>
                    <td><center><?php echo $fila['codVuelo'];?></center></td>
                    <td><center><?php echo $fila['nombre_aerolinea'];?></center></td>
                    <td><center><?php echo $fila['ciudad_origen'];?></center></td>
                    <td><center><?php echo $fila['fecha_hora_salida'];?></center></td>
                    <td><center><?php echo $fila['ciudad_destino'];?></center></td>
                    <td><center><?php echo $fila['fecha_hora_llegada'];?></center></td>
                    <td><center><?php echo $fila['costo_vuelo'];?></center></td>
                    <td><center><?php echo $fila['costo_primera_clase'];?></center></td>
                    <td><center><?php echo $fila['estado'];?></button><center></td>
                  </tr>
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
    
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Data Table -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
  <!-- Bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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