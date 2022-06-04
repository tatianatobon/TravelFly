<?php
$contador= 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambiar silla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div >
        <h1> Cambio de silla</h1>
    </div>
    <h3 class="center"> Primera clase</h3>
    <?php
    
    for($i = 1; $i <= 7 ; $i++):
    ?>
    <div class="row">
        <?php
        for($a = 1; $a <= 7 ; $a++):
        ?>
        <form action="" method="post " style="width: 4%; margin-left: 4px; margin-top: 4px; padding-left: 10px">
                <input type="hidden" name="silla" value="<?= $contador?>">
                <button class="btn btn-warning"  value="<?=$contador?>"><?=$contador ?></button>
        </form>
        <?php
        $contador++;
        endfor;
        ?>
    </div>
    
    <?php
    endfor;
    ?>
    <h3 class="center"> Clase Turistica</h3>
    <?php
    for($i = 1; $i <= 7 ; $i++):
    ?>
    <div class="row">
        <?php
        for($a = 1; $a <= 21 ; $a++):
        ?>
            <form action="" method="post " style="width: 4%; margin-left: 4px; margin-top: 4px; padding-left: 10px">
                <input type="hidden" name="silla" value="<?= $contador?>">
                <button class="btn btn-success" ><?=$contador ?></button>
            </form>
        <?php
        $contador++;
        endfor;
        ?>
    </div>
    
    <?php
    endfor;
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <!-- JQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</html>

<script>
    $('.btn').click(function(){
        let valor = $('.btn').val();
        console.log(valor);
        console.log('entre');
    });
</script>