<?php
    session_start();

    if(!isset($_SESSION['id_rol'])){
        header("Location: InicioSesion.html");
    }else{
        if ($_SESSION['id_rol'] != 1){
            header("Location: menu_root.php");
        }
    }
    $recibido=0;
?>
<?php include('conexion.php'); ?>

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
        <title>Menu Root</title>
    </head>
    <body>
    <div>
        <nav class="navbar navbar-inverse navbar-dark bg-primary">
          <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img/Logotipo.png" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"></a>
            </div>
            <div class="navbar-nav mr-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir">Cerrar Sesión <i class="bi bi-box-arrow-right"></i></button>
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
                                    <h4>¿Está seguro de salir?</h4>  
                                </center>
                            </div>
                            <div class="modal-footer">
                                <a href="salir.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button>
                                </a>
                                <a href="menu_root.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </nav>
    </div>
    <br><b>
    <center>
        <font face="Times New Roman" size="8" color="Black">Listado de Administradores</font>
    </center>
    <!-- Alertas Crear, Editar, Eliminar -->
    <?php include('alertas.php'); ?>
    <!-- DataTable -->
    </b><br>
    <div class="container">
        <div class="row">
            <div class="col-1">
                <div class="text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCrear"><i class="bi bi-person-plus-fill"></i></button>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="tablaAdmi" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th><center>Nombre Completo</center></th>
                        <th><center>Documento</center></th>
                        <th><center>Celular</center></th>
                        <th><center>Correo</center></th>
                        <th><center>Opciones</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2' ORDER BY id_usuario";
                    $resultado = mysqli_query($enlace, $consulta);

                    while($fila = mysqli_fetch_array($resultado)){?>      
                        <tr>
                            <td><center><?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?></center></td>
                            <td><center><?php echo $fila['documento'];?></center></td>
                            <td><center><?php echo $fila['celular'];?></center></td>
                            <td><center><?php echo $fila['email'];?></center></td>
                            <td><center>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo $fila['id_usuario']; ?>"><i class="bi bi-trash-fill"></i></button>
                            <center></td>
                        </tr>
                        <!-- Modal crear Administrador -->
                        <?php include('modal_crear_admi.php'); ?>
                        <!-- Modal Editar Administrador -->
                        <?php include('modal_eliminar_admi.php'); ?>
                    <?php  } 
                    mysqli_close($enlace);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Paises,Departamentos y Ciudades -->
    <script src="https://jeff-aporta.github.io/main/00Libs/Sites/sites.min.js"></script>
    <!-- Api de paises -->
    <script>
        actualizarPaises()
        actualizarBandera()
        actualizarEstados()
        actualizarCiudades()

        function actualizarPaises() {
             document.getElementById("paises").innerHTML = $optionPaises()
        }

        function actualizarBandera() {
             let flag = document.getElementById("flag");
             let pais = document.getElementById("paises").value;
             flag.src = $regiones[pais].flagSVG_4x3
        }

        function actualizarEstados() {
             let pais = document.getElementById("paises").value
             document.getElementById("estados").innerHTML = $optionEstados(pais)
        }

        function actualizarCiudades() {
             let pais = document.getElementById("paises").value
             let estado = document.getElementById("estados").value
             document.getElementById("ciudades").innerHTML = $optionCiudades(pais, estado)
        }
    </script>
    <!-- Mensajes Input -->
	<script> 
		function valida_envia(){
			if (document.fvalida.nombre.value.length==0){
					alert("Tiene que escribir su nombre")
					document.fvalida.nombre.focus()
					return 0;
			}
			if (document.fvalida.apellido.value.length==0){
					alert("Tiene que escribir sus apellidos")
					document.fvalida.apellido.focus()
					return 0;
			}
			if (document.fvalida.documento.value.length==0){
					alert("Falta por ingresar su documento")
					document.fvalida.documento.focus()
					return 0;
			}
			if (document.fvalida.celular.value.length==0){
					alert("Debe ingresar su numero de celular")
					document.fvalida.celular.focus()
					return 0;
			}
			if (document.fvalida.direccion.value.length==0){
					alert("Debe ingresar la direccion de su hogar")
					document.fvalida.direccion.focus()
					return 0;
			}
			if (document.fvalida.email.value.length==0){
					alert("Debe ingresar su correo electronico")
					document.fvalida.email.focus()
					return 0;
			}
			if (document.fvalida.user.value.length==0){
					alert("Falta por ingresar su usuario")
					document.fvalida.user.focus()
					return 0;
			}
			if (document.fvalida.pass.value.length==0){
					alert("Debe ingresar una contraseña")
					document.fvalida.pass.focus()
					return 0;
			}
			if (document.fvalida.confirmPass.value.length==0){
					alert("Debe confirmar la contraseña")
					document.fvalida.confirmPass.focus()
					return 0;
			}
			//el formulario se envia
			alert("Muchas Gracias!!! Su usuario ha sido creado");
			document.fvalida.submit();
		}
	</script>
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
