<!-- Modal Editar Administrador -->
<div class="modal fade" id="modalEditar<?php echo $fila['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00CAFC;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Editar Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="editar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
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
                                            
                        <div style="display: inline-block;text-align: left;">
                            <div style="text-align: left;">País Nacimiento</div>
                            <img src="" id="flag" width="40px" style="vertical-align: top;">
                            <select id="paises" name="pais" value="<?php echo $fila['pais']?>" disabled onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
                        </div>
                        <div style="display: inline-block;text-align: left;">
                            Estado
                            <select id="estados" name="estado" value="<?php echo $fila['estado']?>" disabled onchange="actualizarCiudades()"></select>
                        </div>
                        <div style="display: inline-block;text-align: left;">
                            Ciudad
                            <select id="ciudades" disabled name="ciudad" value="<?php echo $fila['ciudad']?>"></select>
                        </div>

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