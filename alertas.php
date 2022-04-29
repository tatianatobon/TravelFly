<!-- Alertas Crear, Editar, Eliminar -->
<?php  
    foreach ($_REQUEST as $var => $val) {
    $$var=$val; 
           
}if($recibido == 1){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Advertencia!</strong> El Usuario ya se encuentra creado. Vuelva a Intentar.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php }else if($recibido == 2){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Exito!</strong> El Usuario fue creado correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php }else if($recibido == 3){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Exito!</strong> El Usuario fue editado.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php }else if($recibido == 4){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> No se pudo editar el Usuario.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php }else if($recibido == 5){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Exito!</strong> El Usuario fue eliminado.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php }else if($recibido == 6){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>  No se pudo eliminar el Usuario.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>