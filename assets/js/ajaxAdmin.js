 //TABLE BILLETS
 function billetTable(){
    var idBillet = $('.post-info').attr('value');
    
    $.post({
        url: 'adminajax',
        data:{'billetId': idBillet, 'action': 'showbillet'},
        success: function(data){
            if(!$.trim(data)){
                $('#billetTableTitre h2').text('0 billet posté');
                $('#tableBillets').hide();
            } else{     
                let newBilletTable = $(data);
                newButtonDeleteB = $('#deleteBillet').find('.deleteBilletconfirmBtn');
                console.log(newButtonDeleteB );
                newButtonDeleteB.on('click', function(){
                    deleteComBtn(newButtonDeleteB);
                })

                $('#tbodyBillet').html(newBilletTable);
            }
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
                $('#commentTableTitre h2').text('0 commentaire signalé');
                $('#tableComments').hide();
            } else{     
            let newCommentTable = $(data);

            newButtonUnsignal = newCommentTable.find('.unsignalComBtn');
            newButtonUnsignal.on('click', function() {
                unsignalCom(newButtonUnsignal);
            })

            newButtonModere = newCommentTable.find('.modereComBtn');
            newButtonModere.on('click', function(){
                modereComBtn(newButtonModere);
            })

            newButtonDelete = newCommentTable.find('.deleteComBtn');
            newButtonDelete.on('click', function(){
                modereComBtn(newButtonDelete);
            })

            $('#tbodyComment').html(newCommentTable);
            
            } 
        }
    });
}
$(window).bind('load', function(){

function deleteBilBtn(button){
    var idBilToDelete = button.attr('value');
    $.post({
        url: 'adminajax',
        data: {'action': 'deleteBillet','deleteBillet' : idBilToDelete},
        success: function(data){
           billetTable();
        }
    });
}


function unsignalCom(button){
    var idComToUnsignal = button.attr('value');
    $.post({
        url: 'adminajax',
        data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
        success: function(data){
           commentTable();
        }
    });
}

function modereComBtn(button){
    var idComToModere = button.attr('value');
    $.post({
        url: 'adminajax',
        data: {'action': 'moderer', 'modere' : idComToModere},
        success: function(data){
           commentTable();
        }
    });
}

function deleteComBtn(button){
    var idComToDelete = button.attr('value');
    $.post({
        url: 'adminajax',
        data: {'action': 'deleteComment','deleteCom' : idComToDelete},
        success: function(data){
           commentTable();
        }
    });
}

let deleteBilModal = new Modal(document.querySelector('body'), {
    id: 'deleteBillet',
    titre: 'Suppression',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir supprimer ce billet?'
 });


//BOUTONS CONFIRMATION MODAL

$('.deleteBilBtn').on('click', function(){
    var idBilToDelete=$(this).attr('value');
    $('.deleteBilBtn').attr({'data-toggle':"modal", 'data-target':"#deleteBillet"});
    deleteBilModal;
    $('.deleteBilletconfirmBtn').attr('value', idBilToDelete);
})

$('.deleteBilletconfirmBtn').on('click', function(){
    deleteBilBtn($('.deleteBilletconfirmBtn'));
})

//BOUTONS COMMENTAIRES SIGNALÉS
$('.unsignalComBtn').on('click', function() {
    unsignalCom( $('.unsignalComBtn'));
})
    
$('.modereComBtn').on('click', function() {
    modereComBtn( $('.modereComBtn'));
})

$('.deleteComBtn').on('click', function() {
    deleteComBtn( $('.deleteComBtn'));
})

        

})

billetTable();
            
commentTable();       
        
    


    

  

    

      
