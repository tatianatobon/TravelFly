    
  

  <?php $__env->startSection('content'); ?>
   <!-- contenido -->
    <div class="imagendefondo">
        <div id="menu">
          <div id="encabezados">
            <div class="btn-menu"><input id="btn1" onchange="cambiarvista()" type="radio" name="seccion-name" checked><label for="btn1">Reservar vuelo</label></div>
            <div class="btn-menu"><input id="btn2" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn2">Gestionar tu reserva</label></div>
            <div class="btn-menu"><input id="btn3" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn3">Check-in</label></div>
            <div class="btn-menu"><input id="btn4" onchange="cambiarvista()" type="radio" name="seccion-name"><label for="btn4">Estado del vuelo</label></div>

          </div>
        </div>
        <div id="vista">
          <div id="vista1">
              <label><input type="radio" name="tipo-de-viaje">solo ida</label>
              <label><input type="radio" name="tipo-de-viaje">ida y vuelta</label>
          </div>
          <div id="vista2">esta es la vista dos</div>
          <div id="vista3">esta es la vista tres</div>
          <div id="vista4">esta es la vista cuatro</div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navegador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TravelFly\resources\views/principal.blade.php ENDPATH**/ ?>