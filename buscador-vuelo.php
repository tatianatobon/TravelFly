<?php
require_once('conexion.php');
$origen = $_POST['origen'];
$destino = $_POST['destino'];


$consulta="SELECT * FROM vuelo 
            INNER JOIN origen INNER JOIN destino INNER JOIN origen_nacional INNER JOIN destino_nacional 
            WHERE origen.ciudad_origen = '$origen' or destino.ciudad_destino = '$destino'
            or origen_nacional.ciudad_origen = '$origen' or destino_nacional.ciudad_destino = '$destino'
            GROUP BY vuelo.id_vuelo";
$resultado=mysqli_query($enlace, $consulta);
while($row=mysqli_fetch_array($resultado)){
?>
    <div class="row" style="border: black 2px solid; margin: 5px; border-radius: 6px;">
        <div class="col">
           <h4><?= $row[15]?> -----<span class="icon-flight_takeoff"></span>----- <?= $row[17] ?></h4>
        </div>
        <div class="col">
            <h5>Cod.<?= $row['codVuelo'] ?> </h5>
            <h6>fecha: <?= $row['fecha_hora_salida']?></h6>
        </div>
         <div class="col">
            <h3><p>$ <?= $row['costo_vuelo'];?> COP</p></h3>
        </div>
        <div class="col" style="padding-top: 12px">
            <div>
                <button type="button" class="btn btn-info">Comprar</button>
            </div>
        </div>
    </div>
<?php
}
