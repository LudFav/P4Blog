
        
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
            

    