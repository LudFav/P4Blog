
        
        $('.signalbtn').on('click', function() {
            
            var id=$(this).attr('value');
                console.log(id);
                $.post({
                     url: 'ajax',
                     data: {'idSignal' : id },
                     success: function(data){
                        console.log('OK' + data);
                    }
                
                });
        });
            

    