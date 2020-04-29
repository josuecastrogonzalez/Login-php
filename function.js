 $(document).ready(function(){
            
            $("#confirmar").click(function(){
               alertify.confirm("¿Desea Confirmar?");
                
            });
            
        });
    

$(document).ready(function(){
    
    $('#limpiar').click(function(){
        $('.libro').val('');
        $('.autor').val('');
        $('.ano').val('');
        $('.editorial').val('');
        $('.comentario').val('');
    });
    
});