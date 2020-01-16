
        
        $('.signalbtn').on('click', function() {
            
            var id=$(this).attr('value');
            var billetId=$('.post-info').attr('value');
                console.log(id);
                console.log('post&id='+billetId);
                $.post({
                     url: 'post&id='+billetId,
                     data: {'idSignal' : id },
                     /*success: function(data){
                        console.log(data);
                    }*/
                
                });
        });


// ADMIN
        $('.unsignalComBtn').on('click',function(){
            var idComToUnsignal=$(this).attr('value');
            console.log(idComToUnsignal);
            $.post({
                 url: 'admin',
                 data: {'unSignal' : idComToUnsignal},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });

        $('.modereComBtn').on('click',function(){
            var idComToModere=$(this).attr('value');
            console.log(idComToModere);
            $.post({
                 url: 'admin',
                 data: {'modere' : idComToModere},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });

        $('.deleteComBtn').on('click',function(){
            var idComToDelete=$(this).attr('value');
            console.log(idComToDelete);
            $.post({
                 url: 'admin',
                 data: {'delete' : idComToDelete},
                 /*success: function(data){
                    console.log(data);
                }*/
            });
        });
   
            

    