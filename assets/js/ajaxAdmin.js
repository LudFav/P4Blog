//TABLE BILLETS**********************************************************
console.log('test live');

function billetTable(){ 
    console.log('test 01');
    let url_string = window.location.href;
    let url = new URL(url_string);
    let page = url.searchParams.get("page");
    if( page == null){
        page = 1;
    }
    console.log(page);
   $.post({
       url: 'adminajax',
       data:{'action': 'showbillet', 'page': page },
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
                $('#moderedCommentTableTitre h2').text('Commentaires Modérés');  
                $('#moderedCommentsTable').show();  
            let newModeredCommentTable = $(data);

            newButtonUnmodere = newModeredCommentTable.find('.unmodereComBtn');
            newButtonUnmodere.on('click', function(){
                modalUnmodereCom;
                idModComToUnmodere = $(this).attr('value');
            })

            newButtonDeleteCom = newModeredCommentTable.find('.deleteModComBtn');
            newButtonDeleteCom.on('click', function(){
                modalDeleteModCom;
                idModComToDelete = $(this).attr('value');
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

function unmodereComBtn(idModComToUnmodere){
    $.post({
        url: 'adminajax',
        data: {'action': 'unmodere', 'unmodere' : idModComToUnmodere},
        success: function(data){
            moderedCommentTable();
        }
    });
}

function deleteModComBtn(idModComToDelete){
    $.post({
        url: 'adminajax',
        data: {'action': 'deleteModCom','deleteCom' : idModComToDelete},
        success: function(data){
            moderedCommentTable();
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

//COMMENTAIRES SIGNALÉ
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
//COMMENTAIRES MODÉRÉ
modalUnmodereCom = new Modal(document.querySelector('body'), {
    id: 'unmodereComModal',
    titre: 'Modération',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir rétablir ce commentaire censuré?'
});
modalDeleteModCom = new Modal(document.querySelector('body'), {
    id: 'deleteModComModal',
    titre: 'Supression',
    type: 'confirmation',
    confirmation: 'Êtes-vous sur de vouloir supprimer ce commentaire censuré?'
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
                moderedCommentTable();
            });
        });


    $('.deleteComBtn').on('click', function() {
        modalDeleteCom;
        idComToDelete=$(this).attr('value');
        $('.deleteComModal-confirmBtn').attr('value', idComToDelete);
    });
        $('.deleteComModal-confirmBtn').on('click', function(){
            $('.signaledCommentRow'+idComToDelete).fadeOut('slow', function(){
                deleteComBtn(idComToDelete);
            });
        });
    //BOUTONS COMMENTAIRES MODÉRÉ
    $('.unmodereComBtn').on('click', function() {
        modalUnmodereCom;
        idModComToUnmodere=$(this).attr('value');
        $('.unmodereComModal-confirmBtn').attr('value', idModComToUnmodere);
    });
        $('.unmodereComModal-confirmBtn').on('click', function(){
            $('.moderedCommentRow'+idModComToUnmodere).fadeOut('slow', function(){
                unmodereComBtn(idModComToUnmodere);
            });
        });

    $('.deleteModComBtn').on('click', function() {
        modalDeleteModCom;
        idModComToDelete=$(this).attr('value');
        $('.deleteModComModal-confirmBtn').attr('value', idModComToDelete);
    });
        $('.deleteModComModal-confirmBtn').on('click', function(){
            $('.moderedCommentRow'+idModComToDelete).fadeOut('slow', function(){
                deleteModComBtn(idModComToDelete);
            });
        });


    
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
    moderedCommentTable();
    $('#billet-wrapper').hide();
    $('#signalCom-wrapper').hide();
    $('#modCom-wrapper').fadeIn(1000);   
})


    

