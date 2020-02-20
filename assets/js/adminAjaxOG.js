//TABLE BILLETS**********************************************************
let page = 1;
let numPage = page;
billetTable();
paginationBillet()
$('.pageAdminBillet.page-link.prev').hide();

function logout(){
    $.post({
        url: 'login',
        data:{'action':'logout'},
        success: function(data){
            window.location.href = data;
        }
    })
}

function isLoggedin(){
    $.post({
        url:'login',
        data:{'action': 'isLogged'},    
        success: function(data){
            if(data=='1'){
                let adminButton = '<li><a href="admin">Administration</a></li>';
                $(adminButton).insertBefore($('.li-logout')); 
                let statut =  '<p class="text-success" style="float:right"> Connecté </p>';
                $(statut).appendTo($('#statut')); 
            }
        }
    })
}


function billetTable(){ 
    console.log('page dans billetTable :'+page)
   $.post({
       url: 'admin',
       data:{'action': 'showbillet', 'page': page},
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
               //PAGINATION
               
               numPage = page;
               pageNav = $('.paginationUl').attr('value');
               pagesMax = $('.actionTd').attr('value');
               $('.pageAdminBillet.page-link.active').attr('value', numPage);
               $('.pageAdminBillet.page-link.active').text(numPage);
               
               if(numPage <= 1){
                $('.pageAdminBillet.page-link.prev').hide();
               } else {
                $('.pageAdminBillet.page-link.prev').show();
               }
               
               if(numPage >= pagesMax ){
               $('.pageAdminBillet.page-link.next').hide();
               } else {
                $('.pageAdminBillet.page-link.next').show();
               }

           }
       }
   });
  
}    

function paginationBillet(){
   
    $.post({
        url: 'controllers/ajaxAdminPhp/ajaxAdminBillet.php',
        data:{'action': 'pagination', 'page': numPage},
        success: function(data){
            pagination = JSON.parse(data);
           let billetAdminPage = pagination.page;
           let billetAdminMaxPages = pagination.maxPages;
            GetBilletPagination(billetAdminPage, billetAdminMaxPages);
            showPagination();  
            console.log('page = '+page);
            console.log('billetMaxPages ='+billetMaxPages);
        }
    })
}


function GetBilletPagination(billetAdminPage, billetAdminMaxPages){
    billetPage = parseInt(billetAdminPage);
    billetMaxPages = billetAdminMaxPages
    paginBillet = new Pagination(document.querySelector('#paginationAdminBillet'), {
     id: 'pageAdminBillet',
     page: billetPage,
     maxPages:billetMaxPages,
     pageNav:2, 
    });
}
function showPagination(){
  
        $('.pageAdminBillet.page-link.next').on('click', function() {
            
            page++
            billetTable(); 
        }) 

        
        $('.page-link.prev').on('click', function() {  
            
            page--;
            billetTable();
         })
}


$('.pageAdminBillet.page-link.active').text(numPage);

//TABLE COMMENTAIRES SIGNALÉS********************************************
let url_string = window.location.href;
let url = new URL(url_string);
pageGet= url.searchParams.get("pageComSign");
function commentTable(){
    $.post({
        url: 'admin',
        data:{'action': 'showCommentSignaled', 'pageComSign': pageGet},
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
function paginationCommentSign(){
    $.post({
        url: 'controllers/ajaxAdminPhp/ajaxAdminComSign.php',
        data:{'action': 'paginationComSign', 'pageComSign': pageGet},
        success: function(data){
            
           let pagination = $(data);
           $('#paginationComSign').html(pagination);
           
        }
    })
   
}


function moderedCommentTable(){
    $.post({
        url: 'admin',
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
        url: 'admin',
        data: {'action': 'deleteBillet','deleteBillet' : idBilletToDelete},
        success: function(data){
           billetTable();
        }
    });
}

function unsignalCom(idComToUnsignal){
    $.post({
        url: 'admin',
        data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
        success: function(data){
           commentTable();
        }
    });
}

function modereComBtn(idComToModere){
    $.post({
        url: 'admin',
        data: {'action': 'moderer', 'modere' : idComToModere},
        success: function(data){
           commentTable();
        }
    });
}

function deleteComBtn(idComToDelete){
        $.post({
            url: 'admin',
            data: {'action': 'deleteComment','deleteCom' : idComToDelete},
            success: function(data){
               commentTable();
            }
        });
}

function unmodereComBtn(idModComToUnmodere){
    $.post({
        url: 'admin',
        data: {'action': 'unmodere', 'unmodere' : idModComToUnmodere},
        success: function(data){
            moderedCommentTable();
        }
    });
}

function deleteModComBtn(idModComToDelete){
    $.post({
        url: 'admin',
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


    $('.logout').on('click', function(){
        logout();
    });
    
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


isLoggedin();


paginationCommentSign();

$('#signalCom-wrapper').hide();
$('#modCom-wrapper').hide();

$('#billetLink').on('click', function(){
    $('#signalCom-wrapper').hide();
    $('#modCom-wrapper').hide();
    $('#billet-wrapper').fadeIn(1000);
})
$('#signalComLink').on('click', function(){
    commentTable();
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