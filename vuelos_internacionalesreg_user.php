<?php
    include('conexion.php'); 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Data Table -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <title>Busqueda Vuelos Nacionales</title>
    </head>
    <body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"/></a>
        </div>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff">
                Busca Vuelos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="vuelos_nacionales_user.php">Vuelos Nacionales</a></li>
                <li><a class="dropdown-item" href="vuelos_internacionalesida_user.php">Vuelos internacionales Ida</a></li>
                <li><a class="dropdown-item" href="vuelos_internacionalesreg_user.php">Vuelos Internacionales Regreso</a></li>
              </ul>
            </li>
          </ul>
        <div class="navbar-nav mr-auto">
          <i class="fa fa-sign-out"></i> <a href="InicioSesion.html" style="color: #ffffff">Iniciar Sesion </a>
        </div>
      </div>
    </nav>
    </div>
    <br><b>
    <!--<center>
        <font face="Times New Roman" size="8" color="Black">Vuelos Nacionales</font>
    </center>
     DataTable -->
    </b>
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="text-center">
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
            <table id="tablaAdmi" class="table table-striped table-bordered" style="width:100%">                    
                <thead>
                    <tr>
                        <th><center>Aerolinea</center></th>
                        <th><center>Datos de Salida</center></th>
                        <th><center>Datos de Destino</center></th>
                        <th><center>Opciones</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $consulta = "SELECT vuelo.id_vuelo, vuelo.codVuelo, aerolineas.nombre_aerolinea, origen.ciudad_origen, vuelo.fecha_hora_salida, destino.ciudad_destino, tiempo_vuelo.id_cant_horas,
                        DATE_ADD(DATE_ADD(vuelo.fecha_hora_salida, INTERVAL destino.tiempo_dif_regreso HOUR), INTERVAL tiempo_vuelo.cantidad_horas HOUR) AS fecha_hora_llegada,
                        vuelo.costo_vuelo, (vuelo.costo_vuelo + 230000) AS costo_primera_clase FROM vuelo 
                        INNER JOIN origen ON vuelo.id_ciudad_origen = origen.id_ciudad_origen 
                        INNER JOIN destino ON vuelo.id_ciudad_destino = destino.id_ciudad_destino 
                        INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo
                        INNER JOIN aerolineas ON vuelo.id_aerolinea = aerolineas.id_aerolinea 
                        INNER JOIN tiempo_vuelo ON vuelo.id_cant_horas = tiempo_vuelo.id_cant_horas WHERE tipo_vuelo.id_tipo_vuelo = '3' AND vuelo.estado = 'Activo' ORDER BY id_vuelo;";
                        $resultado = mysqli_query($enlace, $consulta);

                        while($fila = mysqli_fetch_array($resultado)){?>
                            <?php
                                date_default_timezone_set("America/Bogota");
                                $fecha_actual = date("Y-m-d H:i:s");
                                $fecha_entrada = $fila['fecha_hora_salida'];

                                if($fecha_actual >= $fecha_entrada){
                                    $consulta = "UPDATE vuelo SET estado = 'Realizado' WHERE id_vuelo = $fila[id_vuelo]";
                                    mysqli_query($enlace, $consulta);
                                }
                            ?>    

                            <tr>
                                <td><center><?php echo $fila['nombre_aerolinea'];?></center></td>
                                <td><center><?php echo $fila['ciudad_destino'];?><br><?php echo $fila['fecha_hora_salida'];?></center></td>
                                <td><center><?php echo $fila['ciudad_origen'];?><br><?php echo $fila['fecha_hora_llegada'];?></center></td>
                                <td><center>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfoVuelo<?php echo $fila['id_vuelo']; ?>"><i class="bi bi-info-circle"></i>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAdvertencia"><i class="bi bi-cart-check"></i>
                                </button><center></td>
                            </tr>
                            <!-- Modal Info Vuelo -->
                            <div class="modal fade" id="modalInfoVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary" >
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Datos del Vuelo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <form action="" method="post" id="formulario">
                                                    <strong><h5>Vuelo Co.<?php echo $fila['codVuelo'];?> <i class="fa fa-plane" aria-hidden="true"></i></h5></strong><br>
                                                    <strong><h5>Aerolinea: <?php echo $fila['nombre_aerolinea'];?></h5></strong><br>
                                                    <strong><h5><center>Origen:<br><?php echo $fila['ciudad_destino'];?><br><?php echo $fila['fecha_hora_salida'];?></center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center>|</center></h5></strong>
                                                    <strong><h5><center><i class="fa fa-arrow-down" aria-hidden="true"></center></i></h5></strong>
                                                    <strong><h5><center>Destino:<br><?php echo $fila['ciudad_origen'];?><br><?php echo $fila['fecha_hora_llegada'];?></center></h5></strong><br>
                                                    <strong><h5>Tiempo de Vuelo: <?php echo $fila['id_cant_horas'];?> Horas</h5></strong><br>
                                                    <strong><h5>Costo Clase Turista: <?php echo $fila['costo_vuelo'];?></h5></strong><br>
                                                    <strong><h5>Costo Primera Clase: <?php echo $fila['costo_primera_clase'];?></h5></strong><br>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!-- Modal Info Iniciar Sesion -->  
                            <div class="modal fade" id="modalAdvertencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary" >
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-content">
                                                <form action="eliminar_tarjeta.php" method="post" id="formulario">
                                                    <center><img src="img/advertencia.jpg" class="img-fluid" alt="Responsive image"></center><br>
                                                    <strong><h3><center>ADVERTENCIA!!!</center></h3></strong>
                                                    <strong><h5><center>Debes Iniciar Sesion</center></h5></strong>
                                                    <strong><h5><center>Para Poder Comprar o Reservar Vuelos</center></h5></strong>
                                                    <div class="modal-footer">
                                                    <center>
                                                    <a href="vuelos_internacionalesreg_user.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Volver</button></a>
                                                    <a href="InicioSesion.html?id_vuelo=<?php echo $fila['id_vuelo']; ?>"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Iniciar Sesion</button></a>
                                                    <center></td>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php  } 
                        mysqli_close($enlace);
                    ?>
                </tbody>
            </table>
        </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
