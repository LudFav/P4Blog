
//  AJAX FRONT

        //FORMULAIRE D'ENVOI DE COMMENTAIRE
        /*$('.formCommentaire').on('submit', ()=>{
            event.preventDefault();
            var idBillet = $('.post-info').attr('value');
            $.post({
                url:'post&id='+idBillet,
                data: $('.formCommentaire').serialize(),
            })
        })*/

        //BOUTON SIGNALER
        $('.signalbtn').on('click', function() {
            
            var comId=$(this).attr('value');
            var billetId=$('.post-info').attr('value');
                console.log(comId);
                $.post({
                     url: 'post&id='+billetId,
                     data: {'idSignal' : comId },
                     /*success: function(data){
                        console.log(data);
                    }*/
                
                });
        });


// ADMIN
    //BILLETS
    $('.deleteBilBtn').on('click', function() {
        var idBilToDelete=$(this).attr('value');
        console.log(idBilToDelete);
        $.post({
             url: 'admin',
             data: {'deleteBillet' : idBilToDelete},
             success: (data)=>{
                console.log(data);
            }
        });
    });


    //COMMENTAIRES
        $('.unsignalComBtn').on('click', function(){
            var idComToUnsignal=$(this).attr('value');
            console.log(idComToUnsignal);
            $.post({
                 url: 'admin',
                 data: {'unSignal' : idComToUnsignal},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });

        $('.modereComBtn').on('click', function(){
            var idComToModere=$(this).attr('value');
            console.log(idComToModere);
            $.post({
                 url: 'admin',
                 data: {'modere' : idComToModere},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });

        $('.deleteComBtn').on('click', function(){
            var idComToDelete=$(this).attr('value');
            console.log(idComToDelete);
            $.post({
                 url: 'admin',
                 data: {'deleteCom' : idComToDelete},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });
   
            

    