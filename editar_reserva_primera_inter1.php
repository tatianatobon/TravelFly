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
    $consulta = "SELECT vuelo.id_vuelo, vuelo.codVuelo, aerolineas.nombre_aerolinea, origen.ciudad_origen, vuelo.fecha_hora_salida, destino.ciudad_destino, tiempo_vuelo.id_cant_horas,
      DATE_ADD(DATE_ADD(vuelo.fecha_hora_salida, INTERVAL destino.tiempo_dif_ida HOUR), INTERVAL  tiempo_vuelo.cantidad_horas HOUR) AS fecha_hora_llegada,
      vuelo.costo_vuelo, (vuelo.costo_vuelo + 230000) AS costo_primera_clase FROM vuelo 
      INNER JOIN origen ON vuelo.id_ciudad_origen = origen.id_ciudad_origen 
      INNER JOIN destino ON vuelo.id_ciudad_destino = destino.id_ciudad_destino 
      INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo 
      INNER JOIN aerolineas ON vuelo.id_aerolinea = aerolineas.id_aerolinea
      INNER JOIN tiempo_vuelo ON vuelo.id_cant_horas = tiempo_vuelo.id_cant_horas 
      WHERE tipo_vuelo.id_tipo_vuelo = '2' AND vuelo.estado = 'Activo' ORDER BY id_vuelo;";
      $resultado = mysqli_query($enlace, $consulta);
      $fila = mysqli_fetch_array($resultado);
      $tiquetes = array();
      if (array_key_exists('cantidad', $_POST) && $_POST['cantidad']  != '') {
        
        if(isset($_POST['cantidad'])){
          $cantidad = $_POST['cantidad'];
        
        for($i = 1; $i <= $cantidad; $i++):
          $silla = rand(1, 196);
          $usuario = $_SESSION['id_usuario'];
          $nombre = $_POST['nombre-'.$i];
          $apellido = $_POST['apellido-'.$i];
          $documento = $_POST['documento-'.$i];
          $fecha = $_POST['fecha-'.$i];
          $id_genero = $_POST['id_genero-'.$i];
          $telefono = $_POST['telefono-'.$i];
          $email = $_POST['email-'.$i]; 
          $consulta = "INSERT INTO viajero(nombre, apellido, fecha_nacimiento, documento, id_genero, telefono, email)VALUES ('$nombre','$apellido','$fecha','$documento', '$id_genero','$telefono', '$email')";
          mysqli_query($enlace, $consulta);
          $consulta2 = "INSERT INTO asiento(estado_asiento, numAsiento) VALUES ('Ocupado', '$silla')";
          mysqli_query($enlace, $consulta2);
          $consulta3 = "SELECT MAX(id_asiento) AS id_asiento FROM asiento Where 1";
          $respuesta1 = mysqli_query($enlace, $consulta3);
          $resultado1 = mysqli_fetch_array($respuesta1);
          $consulta4 = "SELECT MAX(id_viajero) AS id_viajero FROM viajero Where 1";
          $respuesta2 = mysqli_query($enlace, $consulta4);
          $resultado2 = mysqli_fetch_array($respuesta2);
          $viajero = $resultado2['id_viajero'];
          $asiento = $resultado1['id_asiento'];
          $vuelo = $fila['codVuelo'];
          $consulta7 = "SELECT id_vuelo FROM vuelo WHERE `codVuelo` = '$vuelo' ";
          $respuesta4 = mysqli_query($enlace, $consulta7);
          $resultado4 = mysqli_fetch_array($respuesta4);
          $id_vuelo = $resultado4['id_vuelo'];
          $consulta5 = "INSERT INTO tiquete(id_clase, id_usuario, id_viajero, id_asiento, id_vuelo) VALUES('1', '$usuario', '$viajero', '$asiento', '$id_vuelo')";
          mysqli_query($enlace, $consulta5);
          $consulta6 = "SELECT MAX(id_tiquete) AS id_tiquete FROM tiquete Where 1";
          $respuesta3 = mysqli_query($enlace, $consulta6);
          $resultado3 = mysqli_fetch_array($respuesta3);
          array_push($tiquetes, $resultado3['id_tiquete']);
          
        endfor;
        
        unset($_POST['cantidad']);
      }}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Menu Usuario</title>
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
      <a class="nav-link" href="administrar_vuelo_usuario.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-clipboard2-check-fill"></i></i><span>Organiza tu Vuelo</span></a>
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
        <a class="nav-link" href="forousuario.php"><i class="bi bi-chat-square-text-fill"></i><span>Foro</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="eliminar_cuenta.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>"><i class="bi bi-person-dash-fill"></i><span>Eliminar Cuenta</span></a>
      </li>
    </ul>
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
        </nav> 
        <div class="viajero">
          <div style="width: 95%;margin:auto ;margin-top: 5px;" class="row">
            <center><img src="img/carritoeditar.jpeg" height="60" alt="Responsive image" class="rounded img-fluid d-inline-block align-text-top"></center>
            <div class="col-10 my-auto mx-auto">
              <br><br><br><center><h3>Tus productos</h3></center><br>
            </div>
            <div style="border: solid; border-radius: 10px; border-color: #85929E; width: 900px" class="col-6 my-auto mx-auto row">
              <div style=" width: 300px; " class="col-6 my-auto mx-auto">
                <ul style="list-style:none; padding-left: 1px; ">
                  <li><b>Codigo de vuelo: </b><?php echo $fila['codVuelo'];?></li>
                  <li><b>Salida: </b><?php echo $fila['ciudad_origen'];?></li>
                  <li><b>Destino: </b><?php echo $fila['ciudad_destino'];?></li>
                  <li><b>Fecha salida: </b> <?php echo $fila['fecha_hora_salida'];?></li>
                  <li><b>Feccha llegada: </b><?php echo $fila['fecha_hora_llegada'];?></li>
                  <li><b>Tipo de plan: </b>Primera clase</li>
                </ul>
              </div>

              <div style=" width: 250px;  margin-top: 10px; text-align: center;" class="col-4"><br>
                <h5>Precio</h5><p > $ <?php echo $fila['costo_primera_clase'];?> COP</p>
              </div>
              <input type="hidden" id="costo-vuelo" value="<?= $fila['costo_primera_clase'];?>" >
              <div style=" width: 250px; margin-top: 10px; " class="col-4"><br>
                <?php
                  $consulta = "SELECT * FROM num_tiquetes";
                  $resultado = mysqli_query($enlace, $consulta);
                  $fila = mysqli_fetch_array($resultado);
                ?>
                <label><h5>Numero de Tiquetes</h5></label><br>
                <select name="id_num_personas" id="num_personas" >
                  <?php
                    $consulta_mysql='select * from num_tiquetes';
                    $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                    while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                    echo "<option  value='".$lista["id_num_personas"]."-".$lista["cantidad_personas"]."'>";
                    echo $lista["tipo_personas"];
                    echo "</option>";
                    }
                  ?>
                </select>
                <!-- Button trigger modal -->
                <p style="text-align: center; margin-top: 50px; ">
                  <button type="button" class="btn btn-primary compra" data-toggle="modal" data-target="#exampleModal">
                    Realizar Compra
                  </button>
                  </p>
              </div>
            </div>  
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content"  style="width : 700px;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Datos Compra</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <b>
                  <div style="border: solid; border-radius: 10px; border-color: #85929E; width: 300px; " class="col-4 my-auto mx-auto valor-pago">
                      
                  </div>
                  <br>

                  <?php
                    $consulta = "SELECT usuario.id_usuario, tarjeta.numtarjeta, tiquete.id_tiquete FROM usuario INNER JOIN tarjeta ON usuario.id_usuario = tarjeta.id_usuario
                    INNER JOIN tiquete ON usuario.id_usuario = tiquete.id_usuario WHERE usuario.id_usuario = $_SESSION[id_usuario]";
                    $resultado = mysqli_query($enlace, $consulta);
                    $fila = mysqli_fetch_array($resultado);
                  ?>

                  <div style="border: solid; border-radius: 10px; border-color: #85929E; width: 300px; " class="col-4 my-auto mx-auto">
                    <label><h5>Elige medio de pago</h5></label><br>
                        <select name="numtarjeta" >
                            <?php
                                $consulta_mysql='select * from tarjeta';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                  echo "<option  value='".$lista["numTarjeta"]."'>";
                                  echo $lista["numTarjeta"];
                                  echo "</option>";
                                }
                            ?>
                        </select>  
                        
                      <input type="hidden" name="id-usuario" id="usuario" value="<?= $_SESSION['id_usuario'];?>"> 
                      <input type="hidden" name="id-vuelo" id="vuelo" value="<?= $fila['codVuelo'];?>"> 
                        <p style="text-align: center; margin-top: 20px; "> <button type="button" class="btn btn-primary pagar"> Pagar </button></p>
                  </div>
                </b>
            <?php
              mysqli_close($enlace);
            ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- contenedor de contenido -->
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
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
  <!-- archivo para la cuenta de venta -->
  <script>
    $('.compra').click(function(){
        let valor = $('#costo-vuelo').val();
        var cantidad = $('#num_personas').val();
        /* cantidad = cantidad.split('-'); */
        valor = valor * cantidad[3];
        $('.cantidad').remove();
        $('#personas').remove();
        let html = '<div class="cantidad" style="border: solid; border-radius: 10px; border-color: #85929E;">'+
         '<h5> Valor a Pagar <br> $'+ valor+' COP </h5> </div>'+
         '<input type="hidden" id="personas" value="'+cantidad[3]+'">';  
        $('.valor-pago').append(html);
        $('.pagar').click(function(){
          const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          let result1= ' ';
          const charactersLength = characters.length;
          for ( let i = 0; i < 7; i++ ) {
            result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
          }
          console.log(result1);
          let clase = 2;
          let usuario = $('usuario').val();
          let vuelo = $('vuelo').val();
          let canti = cantidad[3];
          console.log(canti)
          $("#popupBusquedaParroquia").modal('hide');//ocultamos el modal
          $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
          $('.modal-backdrop').remove();//eliminamos el backdrop del modal
              jQuery.ajax({
                  type: "post",
                  url: 'datos-viajero.php',
                  data: {
                      tiquete:  result1 ,
                      clase: clase,
                      usuario: usuario,
                      vuelo: vuelo,
                      canti: canti, 
                  },
                  
                  success: function(result){
                      $('.viajero').html(result);
                  }
              });
        });
    });
  </script>
</body>

</html>