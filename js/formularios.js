/* $(".pais").change(function(){
    var valor = $(this).val();
    $.ajax(
        {
            url: 'vista_ajax.php',
            type: "post",
            data: {
                'valor' : valor,
            },
            success: function(result){
                jQuery('.departamento').html(result);
                    
            } 
        }
    );
}); */

$(document).ready(function(){
    /* var nombre = document.getElementById('nombre'); */

    $('#nombre').change(function(){
       var name =$(this).val().trim();
        name=name.split(/\s+/).join(' ');
        $.ajax(
            {
                url: 'arreglo.php',
                type: "post",
                data: {
                    'nombre' : 'nombre',
                    'valor' : name,
                },
                success: function(result){
                    jQuery('.nombre').html(result);
                    $('#nombre').change(function(){
                        var name =$(this).val().trim();
                         name=name.split(/\s+/).join(' ');
                         $.ajax(
                             {
                                 url: 'arreglo.php',
                                 type: "post",
                                 data: {
                                     'nombre' : 'nombre',
                                     'valor' : name,
                                 },
                                 success: function(result){
                                     jQuery('.nombre').html(result);
                                         
                                 } 
                             }
                         );
                     });
                } 
            }
        );
    });

    $('#apellido').change(function(){
        var name =$(this).val().trim();
         name=name.split(/\s+/).join(' ');
         $.ajax(
             {
                 url: 'arreglo.php',
                 type: "post",
                 data: {
                     'nombre' : 'nada',
                     'valor' : name,
                 },
                 success: function(result){
                     jQuery('.apellido').html(result);
                     $('#apellido').change(function(){
                        var name =$(this).val().trim();
                         name=name.split(/\s+/).join(' ');
                         $.ajax(
                             {
                                 url: 'arreglo.php',
                                 type: "post",
                                 data: {
                                     'nombre' : 'nada',
                                     'valor' : name,
                                 },
                                 success: function(result){
                                     jQuery('.apellido').html(result);
                                         
                                 } 
                             }
                         );
                     });
                         
                 } 
             }
         );
     });

    var form = document.getElementById('formulario-register');
        form.addEventListener('submit', function(evt){
            evt.preventDefault();
            nombre.value.trim();
            console.log(nombre.value);
            var mensajesError = [];
            
        });
});