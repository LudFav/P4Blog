// ADMIN
billetTable();
commentTable();
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
    
    
    
   // $(document).ready(adminActions);

    $(document).ready(function(){
        //BOUTON BILLETS
        $('.deleteBilBtn').on('click', function() {
            var idBilToDelete=$(this).attr('value');
            console.log('test01');
           /* $.post({
                 url: 'adminajax',
                 data: {'action': 'deleteBillet','deleteBillet' : idBilToDelete},
                 success: function(data){
                    billetTable();
                }
            });*/
        });
        
    })


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
    console.log('test03');  
    
    
    $(document).ready(function(){
        console.log('test04');  

        //BOUTONS COMMENTAIRES SIGNALÉS
        $('.unsignalComBtn').on('click', function() {
            console.log('test 03');
            //var idComToUnsignal=$(this).attr('value');
           /* $.post({
                 url: 'adminajax',
                 data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
                 success: function(data){
                    console.log(data);
                }
            });*/
        });

        $('.modereComBtn').on('click', function(){
            var idComToModere=$(this).attr('value');
            console.log(idComToModere);
            /*$.post({
                 url: 'admin',
                 data: {'action': 'moderer', 'modere' : idComToModere},
                 success: function(data){
                    console.log(data);
                }
            });*/
        });

        $('.deleteComBtn').on('click', function(){
            var idComToDelete=$(this).attr('value');
            console.log(idComToDelete);
            /*$.post({
                 url: 'admin',
                 data: {'action': 'deleteComment','deleteCom' : idComToDelete},
                 success: function(data){
                    console.log(data);  
            });*/            
        });
        console.log('test05');  

    })
    


    

  

    

      
