<!-- Modal Eliminar Administrador -->
<div class="modal fade" id="modalEliminar<?php echo $fila['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00CAFC;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">¿Realmente desea eliminar a: ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <form action="eliminar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                    	<input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'];?>">

                        <strong><h4><?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?></h4></strong>

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