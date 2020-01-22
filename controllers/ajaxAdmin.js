// ADMIN

    //TABLE BILLETS
    function billetTable(){
        var idBillet = $('.post-info').attr('value');
        $.post({
            url: 'adminajax',
            data:{'billetId': idBillet, 'action': 'showbillet'},
            success: function(data){
                console.log('test01'); 
                $('#tbodyBillet').html(data);
            }
        })
    }    
    

    //TABLE COMMENTAIRES SIGNALÉS
    function commentTable(){
        $.post({
            url: 'adminajax',
            data:{'action': 'showCommentSignaled'},
            success: function(data){ 
                console.log('test02');                
                $('#tbodyComment').html(data); 
                           
            }
        })
    }
     
    billetTable();
    commentTable();
    console.log('test03'); 
    
//ACTIONS D'ADMINISTRATION

    $(window).bind('load', function(){
        console.log('test04'); 
        //BOUTON BILLETS
        $('.deleteBilBtn').on('click', function() {
            var idBilToDelete=$(this).attr('value');
            console.log('test07');
            $.post({
                url: 'adminajax',
                data: {'action': 'deleteBillet','deleteBillet' : idBilToDelete},
                success: function(data){
                   billetTable();
                }
            });
        }); 

        //BOUTONS COMMENTAIRES SIGNALÉS
        $('.unsignalComBtn').on('click', function() {
            console.log('test 08');
            var idComToUnsignal=$(this).attr('value');
            $.post({
                url: 'adminajax',
                data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
                success: function(data){
                   console.log(data);
                   commentTable();
                }
            });
        });

        $('.modereComBtn').on('click', function(){
            var idComToModere=$(this).attr('value');
            console.log('test 08');
            console.log(idComToModere);
            $.post({
                url: 'adminajax',
                data: {'action': 'moderer', 'modere' : idComToModere},
                success: function(data){
                   console.log(data);
                   commentTable();
                }
            });
        });

        $('.deleteComBtn').on('click', function(){
            var idComToDelete=$(this).attr('value');
            console.log('test 08');
            console.log(idComToDelete);
            $.post({
                url: 'adminajax',
                data: {'action': 'deleteComment','deleteCom' : idComToDelete},
                success: function(data){
                   console.log(data);
                   commentTable();
                } 
            });            
        });
        console.log('test05');
        
       

    })
    


    

  

    

      
