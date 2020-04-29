

$('.galeria__img').click(function(e){
    
    var img = e.target.src;//selecciona la imagen 
    var modal= '<div class="modal" id="modal"><img src="'+ img +'" class="modal__img"><div class="modal__boton" id="modal__boton"><i class="fas fa-times-circle"></i></div> </div>';//crea un div para abrir la imagen
    
    $('body').append(modal);//inserta un contenenido dentro del body
    $('#modal__boton').click(function(){//al hacer click en el boton va a hacer dicha funcion
        $('#modal').remove();//al hacer click al boton se va a remover la imagen
        
    });
    
    $('.modal__img').click(function(){
        $('#modal').remove();
        
    })

});

$(document).keyup(function(e){
          
    if(e.which == 27){
         $('#modal').remove();
        
    }
     if(e.which == 32){
         $('#modal').remove();
    }
    
                  });