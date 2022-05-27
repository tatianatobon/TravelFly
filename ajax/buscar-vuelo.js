$(document).ready(function(){
    $('#buscar-vuelo').click(function(){
        let origen = $('#origen-buscador').val();
        let destino = $('#destino-buscador').val();
        console.log(origen)
        if (origen != null && destino != null){
            console.log('llegue')
            jQuery.ajax({
                type: "post",
                url: 'buscador-vuelo.php',
                data: {
                    origen:  origen ,
                    destino: destino,
                },
                
                success: function(result){
                    $('#resultado').html(result);
                }
            });
        }
        
    });
});