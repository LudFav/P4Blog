
//  AJAX FRONT

        function showComment(){
            var idBillet = $('.post-info').attr('value');
            $.post({
                url: 'ajax',
                data:{'billetId': idBillet, 'action': 'showComment'},
                success: function(data){
                    $('#showComments').html(data);
                }
            })
        }
       
        showComment();

        //FORMULAIRE D'ENVOI DE COMMENTAIRE
        $('.submit-btn').on('click', function(e){
            e.preventDefault();
            if($('#formCommentaire')[0].checkValidity()){
                var idBillet = $('.post-info').attr('value');
                var auteur = $('#auteur').val();
                var contenu = $('#contenu').val();
                $.post({
                    url:'ajax',
                    data:{'action': 'insertCom',
                          'auteur': auteur,
                          'contenu': contenu,
                          'billetId': idBillet},
                    success:function(data){
                        $('#formCommentaire')[0].reset(); 
                        showComment();
                    }
                })   
            }
        })

       
        //BOUTON SIGNALER
    
    
    $(window).bind('load', function(){
        $('.signalbtn').on('click', function(){
            console.log('test signale');
            var comId=$(this).attr('value');
                console.log(comId);
                $.post({
                     url: 'ajax',
                     data: {'action': 'signalCom', 'idSignal' : comId },
                     success: function(data){
                        showComment();
                    }
                });
        });


        $('#loginSubmit').on('click', function(){
            var username = $('#username').val();
            var password = $('#password').val();
            console.log('test');
            $.post({
                url: 'login',
                data: {'action': 'login', 'username': username, 'password': password},
                success: function(data){
                    console.log(data);
                }
                
            });  
        });
    })





    

    