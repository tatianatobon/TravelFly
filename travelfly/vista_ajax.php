<?php
require_once('ConsultasRegistrar.php');
$clase = new Consulta_registro();
$estados = $clase->departamentos($_POST['valor']);

?>

<select name="estado" style="width:200px; color: #515A5A;" >
    <?php foreach($estados as $estado => $valor):?>
    <option name="estado" value="<?= $valor['id']?>"><?= $valor['estadonombre']?></option>
    <?php endforeach; ?>
</select>