<?php
    session_start();

    if(!isset($_SESSION['id_rol'])){
?>
        <script>
            window.location.href="/";
        </script>
<?php      
    }else{
        if ($_SESSION['id_rol'] != 1){
?>
            <script>
                window.location.href="/menu-root";
            </script>
<?php 
        }
    }
    $recibido=0;
?>
@extends('layouts.navegador')

@section('content')
<br><b>
    <center>
        <font face="Times New Roman" size="8" color="Black">Listado de Administradores</font>
    </center>
    <!-- Alertas Crear, Editar, Eliminar -->
    <?php /* include('alertas.php'); */ ?>
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
                    $resultado = DB::select("SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE rol.id_rol = '2' ORDER BY id_usuario");    
                    foreach($resultado as $fila):
?>
                        <tr>
                            <td><center><?= $fila->nombre;?> <?= $fila->apellido;?></center></td>
                            <td><center><?= $fila->documento;?></center></td>
                            <td><center><?= $fila->celular;?></center></td>
                            <td><center><?= $fila->email;?></center></td>
                            <td><center>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $fila->id_usuario; ?>"><i class="bi bi-trash-fill"></i></button>
                            <center></td>
                        </tr>
<?php
                    endforeach;
?>

                        <!-- Modal Crear Administrador -->
                        <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary" >
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Formulario para Administradores</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-content">
                                            <form action="/guardar-administrador" method="post" id="formulario" enctype="multipart/form-data"> 
                                                {{ csrf_field() }} 
                                                <div class="campos-vacios">
                                                    <div class="nombre">
                                                        <label>Nombres</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required />
                                                    </div>
                                                    <div class="apellido">
                                                        <label>Apellidos</label>
                                                        <input type="text" class="form-control" id="apellido" name="apellido"class="form-control"  placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required value>
                                                    </div>		
                                                </div>

                                                <label>Documento</label>
                                                <input type="text" class="form-control" name="documento" class="form-control" placeholder="Ingresa tu numero de Documento" pattern="[0-9]+" minlength="8" maxlength="10" required>

                                                <label>Numero de celular</label>
                                                <input type="text" class="form-control" name="celular" class="form-control" placeholder="Ingresa tu Numero de Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>
                                        
                                                <div style="display: inline-block;text-align: left;">
                                                <div style="text-align: left;">País Nacimiento</div>
                                                    <img src="" id="flag" width="40px" style="vertical-align: top;">
                                                    <select id="paises" name="pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
                                                </div>
                                                <div style="display: inline-block;text-align: left;">
                                                    Estado
                                                    <br>
                                                    <select id="estados" name="estado" onchange="actualizarCiudades()"></select>
                                                </div>
                                                <div style="display: inline-block;text-align: left;">
                                                    Ciudad
                                                    <br>
                                                    <select id="ciudades" name="ciudad"></select>
                                                </div>

                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo"  maxlength="30" required>

                                                <label>Contraseña</label>
                                                <input type="password" name="pass" placeholder="Ingresa una Contraseña"  class="form-control" maxlength="30" pattern=".{8,}" required>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Crear Administrador</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Editar Administrador -->
                        <div class="modal fade" id="modalEditar<?= $fila->id_usuario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #00CAFC;">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Editar Datos</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-content">
                                            <form action="/editar-administrador" method="post" id="formulario" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_usuario" value="<?= $fila->id_usuario;?>">

                                                <label>Nombres</label>
                                                <input type="text" class="form-control" name="nombre" class="form-control" value="<?= $fila->nombre?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                                                <label>Apellidos</label>
                                                <input type="text" class="form-control" name="apellido" class="form-control" value="<?= $fila->apellido?>" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30">

                                                <label>Documento</label>
                                                <input type="text" class="form-control" name="documento" class="form-control" value="<?= $fila->documento?>" pattern="[0-9]+" minlength="10" maxlength="10" disabled>

                                                <label>Numero de celular</label>
                                                <input type="text" class="form-control" name="celular" class="form-control" value="<?= $fila->celular?>" pattern="[0-9]+" minlength="10" maxlength="10">

                                                <label>Fecha nacimiento</label>
                                                <input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" value="<?= $fila->fechaNacimiento?>" class="form-control" min = "1940-01-01" max = "2004-01-01" disabled>
                                                                        
                                                <label>Genero</label>
                                                <select name="id_genero" style="width:38%; color: #515A5A;">
                                                    <?php
                                                    $resultado_consulta_mysql = DB::select("select * from genero");
                                                    foreach($resultado_consulta_mysql as $lista){
                                                        echo "<option  value='".$lista->id_genero."'>";
                                                        echo $lista->tipo_genero;
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                                    
                                                <label>Direccion</label>
                                                <input type="text" name="direccion" value="<?= $fila->direccion?>" class="form-control" maxlength="30">

                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" class="form-control" value="<?= $fila->email?>" maxlength="30">

                                                <label>Usuario</label>
                                                <input type="text" class="form-control" name="user" class="form-control" value="<?= $fila->user?>" maxlength="30">

                                                <label>Contraseña</label>
                                                <input type="password" name="pass" value="<?= $fila->pass?>" class="form-control" maxlength="30" pattern=".{8,}">
                                                <spam> "la contraseña debe contener 8 caracteres"</spam>

                                                <label>Confirmar Contraseña</label>
                                                <input type="password" name="confirmPass" value="<?= $fila->confirmPass?>" class="form-control" maxlength="30" pattern=".{8,}">

                                                <label>Elige una Foto de Perfil</label>
                                                <input type="file" name="foto" id="foto" class="form-control" value="<?= $fila->foto?>">

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
                        <!-- Modal Eliminar Administrador -->
                        <div class="modal fade" id="modalEliminar<?php echo $fila->id_usuario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary" >
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">¿Realmente desea eliminar a: ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-content">
                                            <form action="/eliminar-administrador" method="post" id="formulario" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_usuario" value="<?php echo $fila->id_usuario;?>">

                                                <strong><h4><?php echo $fila->nombre;?> <?php echo $fila->apellido;?></h4></strong>

                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </center>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                </tbody>
            </table>
        </div>
    </div>

    


@endsection
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
    <script src="js/formularios.js"></script>
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