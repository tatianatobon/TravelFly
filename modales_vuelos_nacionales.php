<!-- Modal Crear Vuelo -->
<div class="modal fade" id="modalCrearVuelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Ingresa los datos del vuelo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="guardar_vuelo_nacional.php" method="post" id="formulario" enctype="multipart/form-data">
                        <label>Ciudad Salida</label>
                        <select name="id_nacional_origen" style="width:38%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from origen_nacional';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_nacional_origen"]."'>";
                                echo $lista["ciudad_origen"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Fecha y Hora de Salida</label>
                        <input type="datetime-local" class="form-control" name="fecha_hora_salida" class="form-control" placeholder=" " min = "2022-05-01" required>
                        
                        <label>Ciudad Destino</label>
                        <select name="id_nacional_destino" style="width:38%; color: #515A5A;" required>
                            <?php
                                $consulta_mysql='select * from destino_nacional';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_nacional_destino"]."'>";
                                echo $lista["ciudad_destino"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Tiempo de Vuelo</label>
                        <input type="time" class="form-control" name="tiempo_vuelo" class="form-control" placeholder="" required>

                        <label>Costo del Vuelo</label>
                        <input type="number" class="form-control" name="costo_vuelo" class="form-control" placeholder="Ingresa el costo del vuelo" pattern="[0-9]+" minlength="5" maxlength="10" required>

                        <label>Elige una Foto de Perfil</label>
                        <input type="file" name="foto" class="form-control">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Crear Vuelo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal Editar Vuelos -->
<div class="modal fade" id="modalEditarVuelo<?php echo $fila['id_vuelo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Editar Datos Vuelo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="editar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                        <input type="hidden" name="id_vuelo" value="<?php echo $fila['id_vuelo'];?>">

                        <label>Ciudad Salida</label>
                        <select name="id_nacional_origen" style="width:38%; color: #515A5A;" disabled>
                            <?php
                                $consulta_mysql='select * from origen_nacional';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_nacional_origen"]."'>";
                                echo $fila["ciudad_origen"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Fecha y Hora de Salida</label>
                        <input type="datetime-local" class="form-control" name="fecha_hora_salida" class="form-control" placeholder=" " min ="2022-05-01"  value="<?php echo $fila['fecha_hora_salida']?>"  required>
                        
                        <label>Ciudad Destino</label>
                        <select name="id_nacional_destino" style="width:38%; color: #515A5A;" disabled>
                            <?php
                                $consulta_mysql='select * from destino_nacional';
                                $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                                echo "<option  value='".$lista["id_nacional_destino"]."'>";
                                echo $fila["ciudad_destino"];
                                echo "</option>";
                                }
                            ?>
                        </select>

                        <label>Tiempo de Vuelo</label>
                        <input type="time" class="form-control" name="tiempo_vuelo" class="form-control" placeholder=""  required>

                        <label>Costo del Vuelo</label>
                        <input type="number" class="form-control" name="costo_vuelo" class="form-control" value="<?php echo $fila['costo_vuelo']?>" placeholder="Ingresa el costo del vuelo" pattern="[0-9]+" minlength="5" maxlength="10" required>

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-success">Editar Vuelo</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
