
//  AJAX FRONT

        function showComment(){
            var idBillet = $('.post-info').attr('value');
            $.post({
                url: 'ajax',
                data:{'billetId': idBillet, 'action': 'showComment'},
                success: function(data){
                    if(!$.trim(data)){
                        $('#showComments').text('Soyez la première personne à écrire un commentaire sur ce billet.'); 
                        $('#showComments').attr('style','font-style:italic; margin-bottom:15px;');       
                    } else{
                        let newCommentDisplay= $(data);
                        newButtonSignal = newCommentDisplay.find('.signalbtn');
                        newButtonSignal.on('click', function(){
                            id= $(this).attr('value');
                            signalement(id);
                        });

                        $('#showComments').html(newCommentDisplay);
                    }
                }
            })
        }

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

        function signalement(id){
            $.post({
                 url: 'ajax',
                 data: {'action': 'signalCom', 'idSignal' : id },
                 success: function(data){
                    showComment();
                }
            });
        }  
        //BOUTON SIGNALER
        
    
    $(window).bind('load', function(){

        $('.signalbtn').on('click', function(){
            signalement($(this).attr('value'));
        });

         let login = new Modal(document.querySelector('body'), {
            id: 'connexion',
            titre: 'Connexion',
            type: 'connexion',
            pseudonyme: '',
            motDePasse: '',
            confirmation: 'Veuillez rentrer vos identifiants'
         });
         $('#login').on('click', function(){
             console.log('test connexion')
             login;
          });

          
            $('#connexion-validBtn').on('click', function(){
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
            })
    }) 

    showComment();





    

    