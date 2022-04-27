<?php
 if ($_POST['nombre'] == 'nombre'){
?>
    <input type="text" class="form-control" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéí ]+" maxlength="30" required value="<?=$_POST['valor']?>">
<?php
 }else{
?>
    <input type="text" class="form-control" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéí ]+" maxlength="30" required value="<?=$_POST['valor']?>" >
<?php
}
?>
