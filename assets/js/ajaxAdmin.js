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
            if(!$.trim(data)){
                console.log('blank message')
                //var messageComVide = $('<h3>Aucun commentaire signalé</h3>');
                //messageComVide.appendTo($('#tbodyComment'));
            } else{
            console.log('test02');                
            $('#tbodyComment').html(data);
            } 
        }
    });
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
            $(document).on('click', '.deleteconfirm', function(){
                $.post({
                    url: 'adminajax',
                    data: {'action': 'deleteBillet','deleteBillet' : idBilToDelete},
                    success: function(data){
                       billetTable();
                    }
                });
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

        var delButton = $('<button type="button" class="deleteconfirm btn btn-primary" data-dismiss="modal">oui</button>');
        delButton.appendTo($('.modal-footer'));
        delButton.hide();
        $('.deleteComBtn').on('click', function(){
            var idComToDelete=$(this).attr('value');
            delButton.show();    
            $('.modal-footer').on('click', '.deleteconfirm', function(){    
                $.post({
                    url: 'adminajax',
                    data: {'action': 'deleteComment','deleteCom' : idComToDelete},
                    success: function(data){
                       console.log(data);
                       commentTable();
                    } 
                });
                $('#exampleModal').hide();
            });            
        });
        console.log('test05');
    })
    


    

  

    

      
