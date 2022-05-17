<!-- Modal Crear Tarjeta  -->

<div class="modal fade" id="modalCrearTarjeta<?php echo $_SESSION['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Ingresa Datos de tus Tarjetas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <center><img src="img/tarjetas.png" class="img-fluid" alt="Responsive image"></center><br>
                    <form action="guardar_tarjeta.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>" method="post" enctype="multipart/form-data" id="formulario-register" name="fvalida">

                        <label>Tipo de Tarjeta a Ingresar</label>
                        <select name="id_tipo_tarjeta" style="width:60%; color: #515A5A;">
                            <?php
                                $consulta_mysql='select * from tipo_tarjeta';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_tipo_tarjeta"]."'>";
                                echo $lista["tipo_tarjeta"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Nombre del Propietario</label>
			            <input type="text" class="form-control" name="nombre_propietario" class="form-control" value="<?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?>" pattern="[A-Za-z-Zñóéíáú ]+" minlength="10" maxlength="30">

                        <label>Número de Tarjeta</label>
			            <input type="text" class="form-control" name="numTarjeta" class="form-control" placeholder="4000 1234 5678 9010" pattern="[0-9]+" minlength="16" maxlength="16" required>
                                
                        <label>Código de Seguridad (CVV)</label>
			            <input type="text" class="form-control" name="cvv" class="form-control" placeholder="000" pattern="[0-9]+" minlength="3" maxlength="3" required>

                        <label>Fecha de Vencimiento</label>
			            <input type="date" name="fecha_vencimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" class="form-control" min = "2022-01-01" max = "2030-01-01" required>

                        <div class="modal-footer"><button type="submit" class="btn btn-success">Agregar Tarjeta</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal Eliminar Tarjeta -->
<div class="modal fade" id="modalEliminarTarjeta<?php echo $fila['numTarjeta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">¿Realmente Desea Eliminar La Tarjeta Con Los Siguientes Datos?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="eliminar_tarjeta.php" method="post" id="formulario">
                    	<input type="hidden" name="numTarjeta" value="<?php echo $fila['numTarjeta']; ?>">

                        <strong><h4>Nombre del Propietario: <?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?></h4></strong>
                        <strong><h4>Número de Tarjeta: <?php echo $fila['numTarjeta'];?></h4></strong>
                        <strong><h4>Código de Seguridad (CVV): <?php echo $fila['cvv'];?></h4></strong>
                        <strong><h4>Fecha de Vencimiento: <?php echo $fila['fecha_vencimiento'];?></h4></strong>

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
