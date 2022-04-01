$(".pais").change(function(){
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
});