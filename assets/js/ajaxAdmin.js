//TABLE BILLETS**********************************************************
page = 1;
comSignPage = 1;

billetTable();
commentTable();

function logout(){
    $.post({
        url: 'login',
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
   $.post({
       url: 'admin',
       data:{'action': 'showbillet', 'page':page},
       success: function(data){
           tabTest = JSON.parse(data);
           if(!$.trim(tabTest)){
               $('#billetTableTitre h2').text('0 billet posté');
               $('#tableBillet').hide();
           } else{ 
                let tab2Text= tabTest.billetsOutput;
                let newBilletTable = $(tab2Text);
                newButtonDeleteBillet = newBilletTable.find('.deleteBilBtn');
                newButtonDeleteBillet.on('click', function(){
                modalDeleteBillet;
                idBilletToDelete = $(this).attr('value'); 
               });
               $('#tbodyBillet').html(newBilletTable);
               pagesMax = tabTest.maxPages;
               $('#tbodyBillet').attr('data-pageMax', pagesMax);
               $('#tbodyBillet').attr('data-page', page);
               billetPage = new HtmlPagination('#paginationAdminBillet', 'pageAdminBillet', $('#tbodyBillet').attr('data-page'), $('#tbodyBillet').attr('data-pageMax'), page);
               billetButtonPagination(pagesMax);
           }
       }
   }); 
}

function billetButtonPagination(pagesMax){
    let max = pagesMax
    console.log('pageMax :'+max)
    $('.pageAdminBillet.page-link.next').on('click', function() {
        if(page<pagesMax){
        page++
        billetTable();
        }
    }) 
    $('.pageAdminBillet.page-link.prev').on('click', function() {  
        if(page>1){
        page--;
        billetTable();
        }
     })
    $('.pageAdminBillet.page-link.but').on('click', function(){
        page= $(this).attr('value');
        billetTable();
    })
}

function HtmlPagination(element, paginationId, currentValue, maxValue, pageName){

    this.element = element;
    this.paginationId = paginationId;
    this.currentValue = currentValue;
    this.maxValue = maxValue;
    this.pageName = pageName;
    $(element).html('');
    numPage = parseInt(currentValue);
    pagesmax = parseInt(maxValue);
    pageNav = 2;
    let pagination = $('<nav aria-label="Page navigation '+paginationId+'"></nav>').appendTo($(element));  
    let paginationUl = $('<ul class="'+paginationId+' paginationUl"></ul>').appendTo($(pagination));
    let paginationPrev = $('<li class="page-item"><button class="'+paginationId+' page-link prev">Previous</button></li>').appendTo($(paginationUl));

    for(let i = numPage - pageNav; i < numPage; i++){
        if(i> 0){
        let leftPage = $('<li class="page-item"><a class="'+paginationId+' page-link but left" value='+i+'>' +i+ '</a></li>');
        $(leftPage).appendTo($(paginationUl))
        }    
    }

    let currentPage= $('<li class="page-item current"><p class="'+paginationId+'  page-link active" value="'+numPage+'">'+numPage+'</p></li>').appendTo($(paginationUl));
  
    for(let j = numPage +1; j <= pagesMax; j++){
        let rightPage = $('<li class="page-item"><a class="'+paginationId+' page-link but right" value='+j+'>'+j+'</a></li>');
        $(rightPage).appendTo($(paginationUl));
        if(j >= numPage + pageNav){
        break;
        }
    }

    let paginationNext = $('<li class="page-item"><button class="'+paginationId+' page-link next">Next</button></li>').appendTo(paginationUl);

    $(paginationPrev).hide();
    if(pageName > 1){
     $(paginationPrev).show();
    } else {
     $(paginationPrev).hide();
    }
    
    if(pageName >= pagesmax){
    $(paginationNext).hide();
    } else {
    $(paginationNext).show();
    }  
}

//TABLE COMMENTAIRES SIGNALÉS********************************************
function commentTable(){
    $.post({
        url: 'admin',
        data:{'action': 'showCommentSignaled', 'pageComSign': comSignPage},
        success: function(data){
           
            response = JSON.parse(data)
            if(!$.trim(response)){
                $('#commentTableTitre h2').text('0 commentaire signalé');
                $('#tableComments').hide();
            } else{     
            responseTable = response.commentOutput
            let newCommentTable = $(responseTable);
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
            comSignPagesMax = response.maxComSignPages;
            console.log('comSignPagesMax :'+comSignPagesMax)
            $('#tbodyComment').html(newCommentTable);
            $('#signalComLink').attr('data-comSignpageMax', comSignPagesMax);
            $('#signalComLink').attr('data-comSignpage', comSignPage);
            comSignPagination = new HtmlPagination('#paginationComSign', 'pageAdminComSign', $('#signalComLink').attr('data-comSignpage'), $('#signalComLink').attr('data-comSignpageMax'), comSignPage);
            comSignButtonPagination(comSignPagesMax);
            } 
        }
    });
}

function comSignButtonPagination(comSignPagesMax){
    let max = comSignPagesMax
    console.log('CompageMax :'+max)
    $('.pageAdminComSign.page-link.next').on('click', function() {
        if(comSignPage<pagesMax){
        comSignPage++
        commentTable();
        }
    }) 
    $('.pageAdminComSign.page-link.prev').on('click', function() {  
        if(comSignPage>1){
        comSignPage--;
        commentTable();
        }
     })
}
/*
function paginationCommentSign(){
    $.post({
        url: 'controllers/ajaxAdminPhp/ajaxAdminComSign.php',
        data:{'action': 'paginationComSign', 'pageComSign': pageGet},
        success: function(data){
            
           let pagination = $(data);
           $('#paginationComSign').html(pagination);
           
        }
    })
   
}
*/

function moderedCommentTable(){
    $.post({
        url: 'admin',
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
        url: 'admin',
        data: {'action': 'deleteBillet','deleteBillet' : idBilletToDelete},
        success: function(data){
           billetTable();
        }
    });
}

function unsignalCom(idComToUnsignal){
    $.post({
        url: 'admin',
        data: {'action': 'unsignal', 'comToUnsignal' : idComToUnsignal},
        success: function(data){
           commentTable();
        }
    });
}

function modereComBtn(idComToModere){
    $.post({
        url: 'admin',
        data: {'action': 'moderer', 'modere' : idComToModere},
        success: function(data){
           commentTable();
        }
    });
}

function deleteComBtn(idComToDelete){
        $.post({
            url: 'admin',
            data: {'action': 'deleteComment','deleteCom' : idComToDelete},
            success: function(data){
               commentTable();
            }
        });
}

function unmodereComBtn(idModComToUnmodere){
    $.post({
        url: 'admin',
        data: {'action': 'unmodere', 'unmodere' : idModComToUnmodere},
        success: function(data){
            moderedCommentTable();
        }
    });
}

function deleteModComBtn(idModComToDelete){
    $.post({
        url: 'admin',
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
    billetPage;
    comSignPagination;
    billetButtonPagination(pagesMax);
    comSignButtonPagination(comSignPagesMax);

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


//paginationCommentSign();

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



    

