
$(document).ready(function(){
    

    $('.campos-vacios').on("change", '#nombre', function(){
        var name = $('#nombre').val().trim();
        var apellido = $('#apellido').val();
        name = name.split(/\s+/).join(' ');
        var html = '<div class="nombre">'+       
                        '<label>Nombres</label>'+
                        '<input type="text" class="form-control" id="nombre" name="nombre" class="form-control"'+
                        'value = "'+name+'" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" '+
                        ' minlength="3" maxlength="30" required />'+
                    '</div>'+
                    '<div class="apellido">'+
                        '<label>Apellidos</label>'+
                        '<input type="text" class="form-control" id="apellido" name="apellido"class="form-control"'+
                        'value = "'+apellido+'" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" '+
                        ' maxlength="30" required value>'+
                    '</div>';
        $('.nombre').remove();
        $('.apellido').remove();

        console.log('campos vacios')
        $('.campos-vacios').append(html);
        
    });

    $('.campos-vacios').on("change", '#apellido', function(){
        var apellido = $('#apellido').val().trim();
        var name = $('#nombre').val();
        apellido = apellido.split(/\s+/).join(' ');
        var html = '<div class="nombre">'+       
                        '<label>Nombres</label>'+
                        '<input type="text" class="form-control" id="nombre" name="nombre" class="form-control"'+
                        'value = "'+name+'" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" '+
                        ' minlength="3" maxlength="30" required />'+
                    '</div>'+
                    '<div class="apellido">'+
                        '<label>Apellidos</label>'+
                        '<input type="text" class="form-control" id="apellido" name="apellido"class="form-control"'+
                        'value = "'+apellido+'" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" '+
                        ' maxlength="30" required value>'+
                    '</div>';
        $('.nombre').remove();
        $('.apellido').remove();

        console.log('campos vacios')
        $('.campos-vacios').append(html);
        
    });


});