<form action="" method="post">
    <input type="hidden" name="clase" value="<?=$_POST['clase'];?>">
    <input type="hidden" name="cantidad" value="<?=$_POST['canti'];?>">
    <div class="row">
        <?php
        for($i = 1; $i <= $_POST['canti']; $i++):
        ?>
        <div class="col" style="border: solid;">
            <input type="hidden" name="id-tiquete-<?=$i?>" value="<?=$_POST['tiquete']?>-<?=$i?>">
            
            <div>
                <label for="nombre"> Nombre</label>
                <input type="text" id="nombre" name="nombre-<?=$i?>" placeholder="Introduce el nombre del viajero <?= $i?>">
            </div>
            <div>
                <label for="apellido"> Apellido</label>
                <input type="text" id="apellido" name="apellido-<?=$i?>" placeholder="Introduce el Apellido del viajero <?= $i?>">
            </div>
            <div>
                <label for="fecha"> Fecha Nacimiento</label>
                <input type="date" id="fecha" name="fecha-<?=$i?>" >
            </div>
            <div>
                <label for="documento"> Documento</label>
                <input type="number" id="documento" name="documento-<?=$i?>" placeholder="Introduce el Apellido del viajero <?= $i?>">
            </div>
            <div>
                <label>Genero</label><br>
                <select name="id_genero-<?=$i?>" style="width:38%; color: #515A5A;">
                    <?php
                    require_once ('conexion.php');
                    $consulta_mysql='select * from genero';
                    $resultado_consulta_mysql=mysqli_query($enlace,$consulta_mysql);
                    while($lista=mysqli_fetch_assoc($resultado_consulta_mysql)){
                        echo "<option  value='".$lista["id_genero"]."'>";
                        echo $lista["tipo_genero"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="telefono"> Telefono</label>
                <input type="number" id="telefono" name="telefono-<?=$i?>" placeholder="Introduce el telefono del viajero <?= $i?>">
            </div>
            <div>
                <label>Email</label><br>
			    <input type="email" class="form-control" name="email-<?=$i?>" class="form-control" placeholder="Ingresa tu Correo" minlength="12" maxlength="30">
            </div>
        </div><!-- col -->
        <?php
        endfor;
        ?>
    </div><!-- row -->
    <button type="submit">comprar tiquetes</button>
</form>