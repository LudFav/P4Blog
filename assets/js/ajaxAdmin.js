//TABLE BILLETS**********************************************************

function billetTable(){ 
   $.post({
       url: 'adminajax',
       data:{'action': 'showbillet'},
       success: function(data){
           if(!$.trim(data)){
               $('#billetTableTitre h2').text('0 billet posté');
               $('#tableBillet').hide();
           } else{     
               let newBilletTable = $(data);
              newButtonDeleteBillet = newBilletTable.find('.deleteBilBtn');
              newButtonDeleteBillet.on('click', function(){
                   modalDeleteBillet;
                   idBilletToDelete = $(this).attr('value');
               });
               $('#tbodyBillet').html(newBilletTable);
           }
       }
   });
}    

//TABLE COMMENTAIRES SIGNALÉS********************************************
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
                modalUnsignalCom;
                idComToUnsignal = $(this).attr('value');
            })

            newButtonModere = newCommentTable.find('.modereComBtn');
            newButtonModere.on('click', function(){
                modalModereCom;
                idComToModere = $(this).attr('value');
            })

            newButtonDeleteCom = newCommentTable.find('.deleteComBtn');
            newButtonDeleteCom.on('click', function(){
                modalDeleteCom;
                idComToDelete = $(this).attr('value');
            })

            $('#tbodyComment').html(newCommentTable);
            
            } 
        }
    });
}

function moderedCommentTable(){
    $.post({
        url: 'adminajax',
        data:{'action': 'showCommentModered'},
        success: function(data){
            if(!$.trim(data)){
                $('#moderedCommentTableTitre h2').text('0 commentaire modéré');
                $('#moderedCommentsTable').hide();
            } else{     
            let newModeredCommentTable = $(data);

            newButtonUnmodere = newModeredCommentTable.find('.modereComBtn');
            newButtonUnmodere.on('click', function(){
                modalUnmodereCom;
                idComToUnmodere = $(this).attr('value');
            })

            newButtonDeleteCom = newModeredCommentTable.find('.deleteComBtn');
            newButtonDeleteCom.on('click', function(){
                modalDeleteCom;
                idComToDelete = $(this).attr('value');
            })

            $('#tbodyCommentModere').html(newModeredCommentTable);
            
            }
        }
    });
}

//FONCTIONS REQUETES AJAX ACTIONS*****************************************

function deleteBilBtn(idBilletToDelete){
    $.post({
        url: 'adminajax',
        data: {'action': 'deleteBillet','deleteBillet' : idBilletToDelete},
        success: function(data){
           billetTable();
        }
    });
}

function unsignalCom(idComToUnsignal){
    $.post({
        url: 'adminajax',
        data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
        success: function(data){
           commentTable();
        }
    });
}

function modereComBtn(idComToModere){
    $.post({
        url: 'adminajax',
        data: {'action': 'moderer', 'modere' : idComToModere},
        success: function(data){
           commentTable();
        }
    });
}

function deleteComBtn(idComToDelete){
        $.post({
            url: 'adminajax',
            data: {'action': 'deleteComment','deleteCom' : idComToDelete},
            success: function(data){
               commentTable();
            }
        });
}



// MODALS *******************************************************************

//BILLETS
modalDeleteBillet = new Modal(document.querySelector('body'), {
    id: 'deleteBillet',
    titre: 'Suppression',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir supprimer ce billet?'
});

//COMMENTAIRES
modalUnsignalCom = new Modal(document.querySelector('body'), {
    id: 'unsignalComModal',
    titre: 'Restauration',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir restaurer ce commentaire?'
});
modalModereCom = new Modal(document.querySelector('body'), {
    id: 'modereComModal',
    titre: 'Modération',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir modérer ce commentaire?'
});
modalDeleteCom = new Modal(document.querySelector('body'), {
    id: 'deleteComModal',
    titre: 'Supression',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir supprimer ce commentaire?'
});


//BOUTONS CONFIRMATION MODAL*************************************************
$( window ).bind("load", function(){
    $('#signalCom-wrapper').hide();
    $('#modCom-wrapper').hide();
    $('#billet-wrapper').show();
    //BOUTONS EFFACER BILLET
    $('.deleteBilBtn').on('click', function(){
        modalDeleteBillet;    
        idBilletToDelete=$(this).attr('value');
        $('.deleteBillet-confirmBtn').attr('value', idBilletToDelete);
    });
        $('.deleteBillet-confirmBtn').on('click', function(){
            $('.billetRow'+idBilletToDelete).fadeOut('slow', function(){
                deleteBilBtn(idBilletToDelete);
            })   
        });

    //BOUTONS COMMENTAIRES SIGNALÉS
    $('.unsignalComBtn').on('click', function() {
        modalUnsignalCom;
        idComToUnsignal=$(this).attr('value');
        $('.unsignalComModal-confirmBtn').attr('value', idComToUnsignal);
    });
        $('.unsignalComModal-confirmBtn').on('click', function(){
            $('.signaledCommentRow'+idComToUnsignal).fadeOut('slow', function(){
                unsignalCom(idComToUnsignal);
            });
        });


    $('.modereComBtn').on('click', function() {
        modalModereCom;
        idComToModere=$(this).attr('value');
        $('.modereComModal-confirmBtn').attr('value', idComToModere);
    });
        $('.modereComModal-confirmBtn').on('click', function(){
            $('.signaledCommentRow'+idComToModere).fadeOut('slow', function(){
                modereComBtn(idComToModere);
            });
        })


    $('.deleteComBtn').on('click', function() {
        modalDeleteCom;
        idComToDelete=$(this).attr('value');
        $('.deleteComModal-confirmBtn').attr('value', idComToDelete);
    });
        $('.deleteComModal-confirmBtn').on('click', function(){
            $('.signaledCommentRow'+idComToDelete).fadeOut('slow', function(){
                deleteComBtn(idComToDelete);
            });
        })
});

billetTable();
commentTable();
moderedCommentTable(); 

$('#billetLink').on('click', function(){

    $('#signalCom-wrapper').hide();
    $('#modCom-wrapper').hide();
    $('#billet-wrapper').fadeIn(1000);
})
$('#signalComLink').on('click', function(){
    $('#billet-wrapper').hide();
    $('#modCom-wrapper').hide();
    $('#signalCom-wrapper').fadeIn(1000);
    
})     
$('#modComLink').on('click', function(){
    $('#billet-wrapper').hide();
    $('#signalCom-wrapper').hide();
    $('#modCom-wrapper').fadeIn(1000);   
})


    

