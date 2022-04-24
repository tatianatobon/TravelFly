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
                    <form action="guardar_administrador.php" method="post" id="formulario" enctype="multipart/form-data">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" required pattern="[A-Za-z-Zñóéí ]+" minlength="3" maxlength="30">

                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" required pattern="[A-Za-z-Zñóéí ]+" minlength="3" maxlength="30">

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
