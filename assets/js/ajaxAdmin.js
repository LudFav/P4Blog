//TABLE BILLETS**********************************************************

function billetTable(){
   var idBillet = $('.post-info').attr('value');
   
   $.post({
       url: 'adminajax',
       data:{'billetId': idBillet, 'action': 'showbillet'},
       success: function(data){
           if(!$.trim(data)){
               $('#billetTableTitre h2').text('0 billet posté');
               $('#tableBillet').hide();
           } else{     
               let newBilletTable = $(data);
               newButtonDeleteB = newBilletTable.find('.deleteComBtn');
               console.log(newButtonDeleteB);
               newButtonDeleteBValid = $('.deleteBillet-confirmBtn');
               newButtonDeleteB.on('click', function(){
                   modalDeleteBillet;
                   idBilToDelete = newButtonDeleteB.attr('value');
                   newButtonDeleteBValid.attr('value', idBilToDelete);
               });
               $('#tbodyBillet').html(newBilletTable);
           }
       }
   })
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
            newButtonUnsignalValid = $('.unsignalComModal-confirmBtn');
            newButtonUnsignal.on('click', function() {
                modalUnsignalCom;
                idComToUnsignal = newButtonUnsignal.attr('value');
            })

            newButtonModere = newCommentTable.find('.modereComBtn');
            newButtonModereValid = $('.modereComModal-confirmBtn');
            newButtonModere.on('click', function(){
                modalModereCom;
                idComToModere = newButtonModere.attr('value');
            })

            newButtonDeleteC = newCommentTable.find('.deleteComBtn');
            newButtonDeleteValid = $('.deleteComModal-confirmBtn');
            newButtonDeleteC.on('click', function(){
                modalDeleteCom;
                idComToDelete = newButtonDeleteC.attr('value');
            })

            $('#tbodyComment').html(newCommentTable);
            
            } 
        }
    });
}

//FONCTIONS REQUETES AJAX ACTIONS*****************************************

function deleteBilBtn(button){
    var idBilToDelete = button.attr('value');
    tr = button.closest('tr');
    $.post({
        url: 'adminajax',
        data: {'action': 'deleteBillet','deleteBillet' : idBilToDelete},
        success: function(data){
           tr.fadeOut('slow');
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
    tr = button.closest('tr');
    console.log(tr);
        $.post({
            url: 'adminajax',
            data: {'action': 'deleteComment','deleteCom' : idComToDelete},
            success: function(data){
            tr.fadeOut('slow');
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
/*$('#deleteComModal').on('shown.bs.modal', function (){ 
  $('#tbodyComment').focus()
})*/

//BOUTONS CONFIRMATION MODAL*************************************************
$( window ).bind("load", function(){
    //BOUTONS EFFACER BILLET
    $('.deleteBilBtn').on('click', function(){
        modalDeleteBillet;    
        var idBilToDelete=$(this).attr('value');
        $('.deleteBillet-confirmBtn').attr('value', idBilToDelete);
    });
        $('.deleteBillet-confirmBtn').on('click', function(){
            deleteBilBtn($('.deleteBilBtn'));
        });

    //BOUTONS COMMENTAIRES SIGNALÉS

    $('.unsignalComBtn').on('click', function() {
        modalUnsignalCom;
        var idComToUnsignal=$(this).attr('value');
        $('.unsignalComModal-confirmBtn').attr('value', idComToUnsignal);
    });
        $('.unsignalComModal-confirmBtn').on('click', function(){
            unsignalCom($('.unsignalComBtn'));
        });


    $('.modereComBtn').on('click', function() {
        modalModereCom;
        var idComToModere=$(this).attr('value');
        $('.modereComModal-confirmBtn').attr('value', idComToModere);
    });
        $('.modereComModal-confirmBtn').on('click', function(){
            modereComBtn( $('.modereComBtn'));
        })


    $('.deleteComBtn').on('click', function() {
        modalDeleteCom;
        var idComToDelete=$(this).attr('value');
        $('.deleteComModal-confirmBtn').attr('value', idComToDelete);
    });
        $('.deleteComModal-confirmBtn').on('click', function(){
            deleteComBtn( $('.deleteComBtn'));
        })
});

billetTable();      
commentTable();   


    

     