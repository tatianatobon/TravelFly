<!-- Modal Crear Administrador -->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00CAFC;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Formulario para Administradores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="guardar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30" required>

                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíá, .-]+" maxlength="30" required>

                        <label>Documento</label>
                        <input type="text" class="form-control" name="documento" class="form-control" placeholder="Ingresa tu numero de Documento" pattern="[0-9]+" minlength="10" maxlength="10" required>

                        <label>Numero de celular</label>
                        <input type="text" class="form-control" name="celular" class="form-control" placeholder="Ingresa tu Numero de Celular" pattern="[0-9]+" minlength="10" maxlength="10" required>

                        <label>Fecha nacimiento</label>
                        <input type="date" name="fechaNacimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" required class="form-control" min = "1940-01-01" max = "2004-01-01">

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
                                            
                        <div style="display: inline-block;text-align: left;">
                            <div style="text-align: left;">País Nacimiento</div>
                            <img src="" id="flag" width="40px" style="vertical-align: top;">
                            <select id="paises" name="pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
                        </div>
                        <div style="display: inline-block;text-align: left;">
                            Estado
                            <select id="estados" name="estado" onchange="actualizarCiudades()"></select>
                        </div>
                        <div style="display: inline-block;text-align: left;">
                            Ciudad
                            <select id="ciudades" name="ciudad"></select>
                        </div>

                        <label>Direccion</label>
                        <input type="text" name="direccion" placeholder="Ingresa tu Direccion" class="form-control" maxlength="30" required>

                        <label>Email</label>
                        <input type="email" class="form-control" name="email" class="form-control" placeholder="Ingresa tu Correo"  maxlength="30" required>

                        <label>Usuario</label>
                        <input type="text" class="form-control" name="user" class="form-control" placeholder="Crea un Usuario"  maxlength="30" required>

                        <label>Contraseña</label>
                        <input type="password" name="pass" placeholder="Ingresa una Contraseña"  class="form-control" maxlength="30" pattern=".{8,}" required>
                        <spam> "la contraseña debe contener 8 caracteres"</spam>

                        <label>Confirmar Contraseña</label>
                        <input type="password" name="confirmPass" placeholder="Confirma la Contraseña" class="form-control" maxlength="30" pattern=".{8,}" >

                        <label>Elige una Foto de Perfil</label>
                        <input type="file" name="foto" id="foto" class="form-control">

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-success">Crear Administrador</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>