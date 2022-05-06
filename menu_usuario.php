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
      $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2' ORDER BY id_usuario";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado)
    ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - imagen -->
      <center>
        <a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="0" class="rounded img-fluid d-inline-block align-text-top"></a>
      </center>
      <hr class="sidebar-divider my-0">
      <br>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        
        <a class="nav-link collapsed volCol" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" data-idprograma="<?php echo $fila['id_usuario']; ?>">
        <i class="bi bi-gear-fill" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample2"></i><span>Editar Datos</span></a>
        </a>

  </li>
       

      
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-send-fill"></i><span>Compras</span></a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-person-circle"></i><span>Historial de vuelos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-chat-square-text-fill"></i><span>Reservas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-mailbox2"></i><span>Check in</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Noticias.html" target="_blank"><i class="bi bi-chat-square-text-fill"></i><span>Noticias</span></a>
      </li>
      
    </ul>

    <div class=" row d-flex justify-content-center">

	  <div class="collapse collapse-horizontal " id="multiCollapseExample1"  >
		<div class="card card-body " style="margin-top: 70px; width: 200%"   >
    <!-- Modal Editar Administrador -->

            <div class="modal-body" >
                <div class="modal-content" style="
  padding: 20px;
  margin: auto;
  border: solid;
  border-radius: 10px;">
  
                    <form action="editar_usuario.php" method="post" id="formulario" enctype="multipart/form-data">
                        <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'];?>">

                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombre" class="form-control" value="<?php echo $fila['nombre']?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellido" class="form-control" value="<?php echo $fila['apellido']?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                        <label>Documento</label>
                        <input type="text" class="form-control" name="documento" class="form-control" value="<?php echo $fila['documento']?>" pattern="[0-9]+" minlength="10" maxlength="10" disabled>

                        <label>Numero de celular</label>
                        <input type="text" class="form-control" name="celular" class="form-control" value="<?php echo $fila['celular']?>" pattern="[0-9]+" minlength="10" maxlength="10">

                        <label>Fecha nacimiento</label>
                        <input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" value="<?php echo $fila['fechaNacimiento']?>" class="form-control" min = "1940-01-01" max = "2004-01-01" disabled>
                                                
                        <label>Genero</label>
                        <select name="id_genero" style="width:38%; color: #515A5A;">
                            <?php
                                $consulta_mysql='select * from genero';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_genero"]."'>";
                                echo $lista["tipo_genero"];
                                echo "</option>";
                                }
                            ?>
                        </select>
                                            
                        <label>Direccion</label>
                        <input type="text" name="direccion" value="<?php echo $fila['direccion']?>" class="form-control" maxlength="30">

                        <label>Email</label>
                        <input type="email" class="form-control" name="email" class="form-control" value="<?php echo $fila['email']?>" maxlength="30">

                        <label>Usuario</label>
                        <input type="text" class="form-control" name="user" class="form-control" value="<?php echo $fila['user']?>" maxlength="30">

                        <label>Contraseña</label>
                        <input type="password" name="pass" value="<?php echo $fila['pass']?>" class="form-control" maxlength="30" pattern=".{8,}">
                        <spam> "la contraseña debe contener 8 caracteres"</spam>

                        <label>Confirmar Contraseña</label>
                        <input type="password" name="confirmPass" value="<?php echo $fila['confirmPass']?>" class="form-control" maxlength="30" pattern=".{8,}">

                        <label>Elige una Foto de Perfil</label>
                        <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $fila['foto']?>">

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-success">Editar Administrador</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	  </div>
	</div>
   
   
    <!-- Modal Editar Administrador -->
    <?php include('modal_editar_admi.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
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
                                <center>
                                    <h4>¿Está seguro de salir?</h4>  
                                </center>
                            </div>
                            <div class="modal-footer">
                                <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button>
                                </a>
                                <a href="menu_usuario.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
          </ul>
          <?php
            mysqli_close($enlace);
          ?>
        </nav>
    </div>
  </div>
  
  
  
</body>

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
</html>